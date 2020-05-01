<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Goutte;
use DB;
use Storage;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // the call method
        $schedule->call(function () {
            DB::table('tes')->insert([['tes' => now()]]);
            
            
            $crawler = Goutte::request('GET', 'https://komiku.co.id/manga');
            $manga = $crawler->filter('.bge')->each(function ($node) {
                return $node->html();
            });
    
            // DEFINISI VARIABEL
            for ($i=10; $i >= 0 ; $i--) { 
                $nama_manga[$i] = trim(explode('</h3>', explode('<h3>', $manga[$i])[1])[0]);
                $slug_manga[$i] = str_replace(' ', '-', str_replace("'", '', str_replace(':', '', str_replace('?', '', strtolower($nama_manga[$i])))));
                $link_manga[$i] = explode('" class="popunder">', explode('<a href="', $manga[$i])[1])[0];
                $episodeChapter[$i] = trim(explode('</a></div>', explode('Chapter', $manga[$i])[1])[0]);
                $linkChapter[$i] = trim(explode('/"', explode('<a href="', $manga[$i])[3])[0]);
                $other[$i] = explode('">', explode('<div class="', $manga[$i])[2])[0];
            }
            
            
            for ($i=10; $i >= 0; $i--) { 
                $queryManga[$i] = DB::table('manga')->where('nama_manga', '=', $nama_manga[$i]);
                $mangaExists[$i] = $queryManga[$i]->exists();
    
                // JIKA MANGA TIDAK ADA MAKA TAMBAHKAN KEDALAM DATABASE
                if($mangaExists[$i] == NULL){
                    DB::table('manga')->insert([
                                                    'nama_manga' => $nama_manga[$i], 
                                                    'slug_manga' => $slug_manga[$i],
                                                    'link_manga' => $link_manga[$i],
                                                    'created_at' => now(),
                                                    'updated_at' => now()
                                                ]);
    
                    
                    // AMBIL ID MANGA
                    // GRAB DETAIL MANGA
                    $data_manga[$i] = $queryManga[$i]->select('id_manga', 'slug_manga', 'link_manga')->get();
    
                    $crawler = Goutte::request('GET', $data_manga[$i][0]->link_manga);
                    
                    // DETAIL CRAWL
                    $detail = $crawler->filter('.inftable td')->each(function ($node) {
                        return $node->text();
                    });
                    
                    // SINOPSIS CRAWL
                    $sinopsis = $crawler->filter('.sec')->each(function ($node) {
                        return $node->html();
                    });
    
                    // GENRE CRAWL
                    $genre = $crawler->filter('.genre')->each(function ($node) {
                        return $node->text();
                    });
    
                    // SPOILER IMAGE CRAWL
                    $imageSpoiler = $crawler->filter('.ls1 img')->each(function ($node) {
                        return str_replace(array('16.5', '25'), array('165', '250'), $node->extract(array('src'))[0]);
                    });
    
                    // IMAGE SAMPUL
                    $imageSampul = $crawler->filter('.ims img')->each(function ($node) {
                        return $node->attr("src");
                    });
    
                    // IMAGE BACKGROUND
                    $imageBackground = $crawler->filter('style')->each(function ($node) {
                        return $node->html();
                    });
                    
                    // SET DEFAULT VALUE
                    $rate_umur = trim(str_replace('Tahun (minimal)', '', $detail[13]));
                    $status_manga = $detail[11];
                    $jenis_manga = $detail[5];
                    if(empty($rate_umur)){ $rate_umur = '15'; }
                    if(empty($status_manga)){ $status_manga = 'Ongoing'; }
                    if(empty($jenis_manga)){ $jenis_manga = 'Manga'; }
                    
                    DB::table('detail_manga')->insert([
                        'judul_indo' => $detail[3], 
                        'jenis_manga' => $detail[5], 
                        'konsep_cerita' => $detail[7], 
                        'komikus'=> utf8_encode($detail[9]), 
                        'status_manga' => $status_manga,
                        'rate_umur' =>  $rate_umur,
                        'views' => $detail[15],
                        'sinopsis' => $sinopsis[0],
                        'id_manga' => $data_manga[$i][0]->id_manga
                    ]);
    
                    // INSERT DATABASE OTHER
                    DB::table('other')->insert([
                                                    'id_manga' => $data_manga[$i][0]->id_manga,
                                                ]);
                    
                    // INSERT KATEGORI DETAIL
                    foreach($genre as $key => $genreList){
                        if($key != 0){
                            $id_kategori = DB::table('kategori')->where('nama_kategori', $genreList)->get();
                            
                            DB::table('detail_kategori')->insert([
                                                                    'id_manga' => $data_manga[$i][0]->id_manga,
                                                                    'id_kategori' => $id_kategori[0]->id_kategori,
                                                                ]);
                        }
                    }
    
                    // INSERT SPOILER IMAGE
                    foreach($imageSpoiler as $key => $imageList){
                    
                        DB::table('spoiler_image')->insert([
                            'nomor_spoiler_image' => $key, 
                            'link_spoiler_image' => $imageList,
                            'id_manga' => $data_manga[$i][0]->id_manga
                        ]);
                    }
    
                    
                     // UPDATE OTHER DB
                     $otherView[$i] = explode(" ", $other[$i]);
                    
                     if (in_array("Rekomendasi", $otherView[$i])){ 
                         DB::table('other')->where('id_manga', $data_manga[$i][0]->id_manga)
                                           ->update(['rekomendasi' => 1]);
                     }
                     if (in_array("Hot", $otherView[$i])){  
                         DB::table('other')->where('id_manga', $data_manga[$i][0]->id_manga)
                                           ->update(['hot' => 1]); 
                     }
                     if (in_array("Berwarna", $otherView[$i])){                                                  
                         DB::table('other')->where('id_manga', $data_manga[$i][0]->id_manga)
                                           ->update(['berwarna' => 1]);
                     }
    
    
                    // INSERT IMAGE SAMPUL
                    $urlSampul = str_replace("’", '%E2%80%99', html_entity_decode($imageSampul[0]));
                    $pathSampul = 'public/komik/sampul_detail/';
                    Storage::put($pathSampul.$data_manga[$i][0]->slug_manga.'.jpg', file_get_contents($urlSampul));
    
    
                    // INSERT IMAGE BACKGROUND
                    $urlBackground = str_replace("’", '%E2%80%99', html_entity_decode(explode(");}}", explode("url(", $imageBackground[0])[1])[0]));
                    $pathBackground = 'public/komik/background_detail/';
                    Storage::put($pathBackground.$data_manga[$i][0]->slug_manga.'.jpg', file_get_contents($urlBackground));
    
                }
    
                // JIKA MANGA SUDAH ADA MAKA CEK DATA CHAPTER
                $data_manga_exists[$i] = $queryManga[$i]->select('id_manga', 'slug_manga', 'link_manga')->get();
                
                $queryChapter[$i] = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                                        ->where('manga.slug_manga', $slug_manga[$i])
                                                        ->where('chapter.episode_chapter', $episodeChapter[$i]);
    
                $cekCHapter[$i] = $queryChapter[$i]->exists();
    
                // JIKA CHAPTER BELUM ADA MAKA MASUKKAN CHAPTER KE DATABASE
                if($cekCHapter[$i] == null){
                    DB::table('chapter')->insert([  'episode_chapter' => $episodeChapter[$i], 
                                                    'judul_chapter' => 'Chapter '.$episodeChapter[$i], 
                                                    'created_at' => now(), 
                                                    'updated_at' => now(), 
                                                    'id_manga' => $data_manga_exists[$i][0]->id_manga
                                                ]);
    
                    DB::table('manga')->where('id_manga', $data_manga_exists[$i][0]->id_manga)
                                        ->update([
                                                    'updated_at' => now()
                                                ]);
                }
    
    
                $id_chapter[$i] = DB::table('chapter')->select('id_chapter')
                                                        ->where('episode_chapter', '=', $episodeChapter[$i])
                                                        ->where('id_manga', '=', $data_manga_exists[$i][0]->id_manga)
                                                        ->get(); 
    
                $id_chapter_fix[$i] = $id_chapter[$i][0]->id_chapter;
    
    
                // MELAKUKAN CRAWL GAMBAR PADA TIAP TIAP CHAPTER
                $crawlerImage[$i] = Goutte::request('GET', $linkChapter[$i]);
                
                $imageChapter[$i] = $crawlerImage[$i]->filter('.bc img')->each(function ($node){
                                    return $node->attr('src');
                                });
                
                $k = 1;
                foreach($imageChapter[$i] as $key =>$linkImage[$i]){
                    
                    if(isset($linkImage[$i])){
    
                        //cek image
                        $cekgambar[$i] = DB::table('gambar')->where('nama_gambar', '=', $k)
                                                            ->where('id_chapter', '=', $id_chapter_fix[$i])
                                                            ->count();
                        
                        if($cekgambar[$i] == 0){
                            DB::table('gambar')->insert([   'nama_gambar' => $k, 
                                                            'link_gambar' => trim($linkImage[$i]), 
                                                            'updated_at' => now(), 
                                                            'id_chapter' => $id_chapter_fix[$i]
                                                        ]);
                        }
                    }
                    $k++;
                }
            }
         
        })->everyMinute();
        
        
        
        
        
        // the call method
        $schedule->call(function () {
            DB::table('tes')->insert([['tes2' => now()]]);
            
            $crawler = Goutte::request('GET', 'https://komiku.co.id/');
            $manga = $crawler->filter('.tpe1_1')->each(function ($node) {
                return $node->html();
            });
    
            // DEFINISI VARIABEL
            for ($i=11; $i >= 0 ; $i--) { 
                $nama_manga[$i] = trim(trim(explode('</h3>', explode('<h3>', $manga[$i])[1])[0]));
                $slug_manga[$i] = str_replace(' ', '-', str_replace("'", '', str_replace(':', '', str_replace('?', '', str_replace(',', '', strtolower($nama_manga[$i]))))));
                $link_manga[$i] = trim(explode('/"', explode('href="', $manga[$i])[1])[0]);
                $episodeChapter[$i] = trim(explode('</b>', explode('Chapter', $manga[$i])[2])[0]);
                $linkChapter[$i] = trim(explode('/"', explode('href="', $manga[$i])[2])[0]);
                $other[$i] = trim(explode('">', explode('<div class="', $manga[$i])[2])[0]);
            }
            
            for ($i=11; $i >= 0; $i--) { 
                $queryManga[$i] = DB::table('manga')->where('nama_manga', '=', $nama_manga[$i]);
                $mangaExists[$i] = $queryManga[$i]->exists();
    
                // JIKA MANGA TIDAK ADA MAKA TAMBAHKAN KEDALAM DATABASE
                if($mangaExists[$i] == NULL){
                    DB::table('manga')->insert([
                                                    'nama_manga' => $nama_manga[$i], 
                                                    'slug_manga' => $slug_manga[$i],
                                                    'link_manga' => $link_manga[$i],
                                                    'created_at' => now(),
                                                    'updated_at' => now()
                                                ]);
    
                    
                    // AMBIL ID MANGA
                    // GRAB DETAIL MANGA
                    $data_manga[$i] = $queryManga[$i]->select('id_manga', 'slug_manga', 'link_manga')->get();
    
                    $crawler = Goutte::request('GET', $data_manga[$i][0]->link_manga);
                    
                    // DETAIL CRAWL
                    $detail = $crawler->filter('.inftable td')->each(function ($node) {
                        return $node->text();
                    });
                    
                    // SINOPSIS CRAWL
                    $sinopsis = $crawler->filter('.sec')->each(function ($node) {
                        return $node->html();
                    });
    
                    // GENRE CRAWL
                    $genre = $crawler->filter('.genre')->each(function ($node) {
                        return $node->text();
                    });
    
                    // SPOILER IMAGE CRAWL
                    $imageSpoiler = $crawler->filter('.ls1 img')->each(function ($node) {
                        return str_replace(array('16.5', '25'), array('165', '250'), $node->extract(array('src'))[0]);
                    });
    
                    // IMAGE SAMPUL
                    $imageSampul = $crawler->filter('.ims img')->each(function ($node) {
                        return $node->attr("src");
                    });
    
                    // IMAGE BACKGROUND
                    $imageBackground = $crawler->filter('style')->each(function ($node) {
                        return $node->html();
                    });
                    
                    // SET DEFAULT VALUE
                    $rate_umur = trim(str_replace('Tahun (minimal)', '', $detail[13]));
                    $status_manga = $detail[11];
                    $jenis_manga = $detail[5];
                    if(empty($rate_umur)){ $rate_umur = '15'; }
                    if(empty($status_manga)){ $status_manga = 'Ongoing'; }
                    if(empty($jenis_manga)){ $jenis_manga = 'Manga'; }
                    
                    DB::table('detail_manga')->insert([
                        'judul_indo' => $detail[3], 
                        'jenis_manga' => $detail[5], 
                        'konsep_cerita' => $detail[7], 
                        'komikus'=> utf8_encode($detail[9]), 
                        'status_manga' => $status_manga,
                        'rate_umur' =>  $rate_umur,
                        'views' => $detail[15],
                        'sinopsis' => $sinopsis[0],
                        'id_manga' => $data_manga[$i][0]->id_manga
                    ]);
    
                    // INSERT DATABASE OTHER
                    DB::table('other')->insert([
                                                    'id_manga' => $data_manga[$i][0]->id_manga,
                                                ]);
                    
                    // INSERT KATEGORI DETAIL
                    foreach($genre as $key => $genreList){
                        if($key != 0){
                            $id_kategori = DB::table('kategori')->where('nama_kategori', $genreList)->get();
                            
                            DB::table('detail_kategori')->insert([
                                                                    'id_manga' => $data_manga[$i][0]->id_manga,
                                                                    'id_kategori' => $id_kategori[0]->id_kategori,
                                                                ]);
                        }
                    }
    
                    // INSERT SPOILER IMAGE
                    foreach($imageSpoiler as $key => $imageList){
                    
                        DB::table('spoiler_image')->insert([
                            'nomor_spoiler_image' => $key, 
                            'link_spoiler_image' => $imageList,
                            'id_manga' => $data_manga[$i][0]->id_manga
                        ]);
                    }
    
                    
                     // UPDATE OTHER DB
                     $otherView[$i] = explode(" ", $other[$i]);
                    
                     if (in_array("Rekomendasi", $otherView[$i])){ 
                         DB::table('other')->where('id_manga', $data_manga[$i][0]->id_manga)
                                           ->update(['rekomendasi' => 1]);
                     }
                     if (in_array("Hot", $otherView[$i])){  
                         DB::table('other')->where('id_manga', $data_manga[$i][0]->id_manga)
                                           ->update(['hot' => 1]); 
                     }
                     if (in_array("Berwarna", $otherView[$i])){                                                  
                         DB::table('other')->where('id_manga', $data_manga[$i][0]->id_manga)
                                           ->update(['berwarna' => 1]);
                     }
    
    
                    // INSERT IMAGE SAMPUL
                    $urlSampul = str_replace("’", '%E2%80%99', html_entity_decode($imageSampul[0]));
                    $pathSampul = 'public/komik/sampul_detail/';
                    Storage::put($pathSampul.$data_manga[$i][0]->slug_manga.'.jpg', file_get_contents($urlSampul));
    
    
                    // INSERT IMAGE BACKGROUND
                    $urlBackground = str_replace("’", '%E2%80%99', html_entity_decode(explode(");}}", explode("url(", $imageBackground[0])[1])[0]));
                    $pathBackground = 'public/komik/background_detail/';
                    Storage::put($pathBackground.$data_manga[$i][0]->slug_manga.'.jpg', file_get_contents($urlBackground));
                }
    
                // JIKA MANGA SUDAH ADA MAKA CEK DATA CHAPTER
                $data_manga_exists[$i] = $queryManga[$i]->select('id_manga', 'slug_manga', 'link_manga')->get();
                
                $queryChapter[$i] = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                                        ->where('manga.slug_manga', $slug_manga[$i])
                                                        ->where('chapter.episode_chapter', $episodeChapter[$i]);
    
                $cekCHapter[$i] = $queryChapter[$i]->exists();
    
                // JIKA CHAPTER BELUM ADA MAKA MASUKKAN CHAPTER KE DATABASE
                if($cekCHapter[$i] == null){
                    DB::table('chapter')->insert([  'episode_chapter' => $episodeChapter[$i], 
                                                    'judul_chapter' => 'Chapter '.$episodeChapter[$i], 
                                                    'created_at' => now(), 
                                                    'updated_at' => now(), 
                                                    'id_manga' => $data_manga_exists[$i][0]->id_manga
                                                ]);
    
                    DB::table('manga')->where('id_manga', $data_manga_exists[$i][0]->id_manga)
                                        ->update([
                                                    'updated_at' => now()
                                                ]);
                }
    
    
                $id_chapter[$i] = DB::table('chapter')->select('id_chapter')
                                                        ->where('episode_chapter', '=', $episodeChapter[$i])
                                                        ->where('id_manga', '=', $data_manga_exists[$i][0]->id_manga)
                                                        ->get(); 
    
                $id_chapter_fix[$i] = $id_chapter[$i][0]->id_chapter;
    
    
                // MELAKUKAN CRAWL GAMBAR PADA TIAP TIAP CHAPTER
                $crawlerImage[$i] = Goutte::request('GET', $linkChapter[$i]);
                
                $imageChapter[$i] = $crawlerImage[$i]->filter('.bc img')->each(function ($node){
                                    return $node->attr('src');
                                });
                
                $k = 1;
                foreach($imageChapter[$i] as $key =>$linkImage[$i]){
                    
                    if(isset($linkImage[$i])){
    
                        //cek image
                        $cekgambar[$i] = DB::table('gambar')->where('nama_gambar', '=', $k)
                                                            ->where('id_chapter', '=', $id_chapter_fix[$i])
                                                            ->count();
                        
                        if($cekgambar[$i] == 0){
                            DB::table('gambar')->insert([   'nama_gambar' => $k, 
                                                            'link_gambar' => trim($linkImage[$i]), 
                                                            'updated_at' => now(), 
                                                            'id_chapter' => $id_chapter_fix[$i]
                                                        ]);
                        }
                    }
                    $k++;
                }
            }
           
         
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
