<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use DB;
use Storage;

class GrabController extends Controller
{   

    // GRAB PADA MANGA TERBARU
    public function newManga(){
        $crawler = Goutte::request('GET', 'https://komiku.co.id/manga');
        $manga = $crawler->filter('.bge')->each(function ($node) {
            return $node->html();
        });

        // DEFINISI VARIABEL
        for ($i=19; $i >= 0 ; $i--) { 
            $nama_manga[$i] = trim(explode('</h3>', explode('<h3>', $manga[$i])[1])[0]);
            $slug_manga[$i] = str_replace(' ', '-', str_replace("'", '', str_replace(':', '', strtolower($nama_manga[$i]))));
            $link_manga[$i] = explode('" class="popunder">', explode('<a href="', $manga[$i])[1])[0];
            $episodeChapter[$i] = trim(explode('</a></div>', explode('Chapter', $manga[$i])[1])[0]);
            $linkChapter[$i] = trim(explode('/"', explode('<a href="', $manga[$i])[3])[0]);
            $other[$i] = explode('">', explode('<div class="', $manga[$i])[2])[0];
        }
        
        
        for ($i=19; $i >= 0; $i--) { 
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
                
                $komikus = $jenis_manga == 'Manhwa' ?  '-' : $detail[9]; 


                DB::table('detail_manga')->insert([
                    'judul_indo' => $detail[3], 
                    'jenis_manga' => $detail[5], 
                    'konsep_cerita' => $detail[7], 
                    'komikus'=> $komikus, 
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


                // INSERT IMAGE SAMPUL
                $urlSampul = str_replace("’", '%E2%80%99', html_entity_decode(explode(");}}", explode("url(", $imageSampul[0])[1])[0]));
                $pathSampul = 'public/komik/sampul_detail/';
                Storage::put($pathSampul.$data_manga[$i][0]->slug_manga.'.jpg', file_get_contents($urlsampul));


                // INSERT IMAGE BACKGROUND
                // $url = explode(");}}", explode("url(", $imageBackground[0])[1])[0];
                $urlBackground = str_replace("’", '%E2%80%99', html_entity_decode(explode(");}}", explode("url(", $imageBackground[0])[1])[0]));
                $pathBackground = 'public/komik/background_detail/';
                Storage::put($pathBackground.$data_manga[$i][0]->slug_manga.'.jpg', file_get_contents($urlBackground));


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
        // echo "<pre>";
        // var_dump($imageChapter);
        // echo "</pre>";    
        
    }

    // MElAKUKAN GRAB PADA DAFTAR MANGA 
    public function daftarManga(){
        $crawler = Goutte::request('GET', 'https://komiku.co.id/daftar-komik/');
        
        $nama = $crawler->filter('h4')->each(function ($node) {
            return $node->text();
        });

        $link = $crawler->filter('.ranking1 > a')->each(function ($node) {
            return $node->extract(array('href'));
        });

        for ($i=0; $i < 1000 ; $i++) { 
            $nama_manga = $nama[$i];
            $slug_manga = str_replace(array('https://komiku.co.id/manga/', '/'),'',$link[$i][0]);
            $link_manga = $link[$i][0];
            
            // SIMPAN MANGA LIST KE DATABASE
            DB::table('manga')->insert([
                                            'nama_manga' => $nama_manga, 
                                            'slug_manga' => $slug_manga, 
                                            'link_manga' => $link_manga, 
                                            'created_at'=> now(), 
                                            'updated_at' => now()
                                        ]);
        }
    }

    public function detailDaftarManga(){

        for ($i=972; $i <= 1000; $i++) { 
        
            $mangalist = DB::table('manga')->select('id_manga', 'link_manga')->where('id_manga', $i)->get();

            $crawler = Goutte::request('GET', $mangalist[0]->link_manga);

            $detail = $crawler->filter('.inftable td')->each(function ($node) {
                return $node->text();
            });
            
            $sinopsis = $crawler->filter('.sec')->each(function ($node) {
                return $node->html();
            });
            
            DB::table('detail_manga')->insert([
                'judul_indo' => $detail[3], 
                'jenis_manga' => $detail[5], 
                'konsep_cerita' => $detail[7], 
                'komikus'=> $detail[9], 
                'status_manga' => $detail[11],
                'rate_umur' => trim(str_replace('Tahun (minimal)', '', $detail[13])),
                'sinopsis' => $sinopsis[0],
                'id_manga' => $mangalist[0]->id_manga
            ]);
        }
    }

    public function viewsDetailDaftarManga(){
        for ($i=101; $i <= 1000; $i++) { 
        
            $mangalist = DB::table('manga')->select('id_manga', 'link_manga')->where('id_manga', $i)->get();

            $crawler = Goutte::request('GET', $mangalist[0]->link_manga);

            $detail = $crawler->filter('.inftable td')->each(function ($node) {
                return $node->text();
            });
            
            DB::table('detail_manga')->where('id_detail_manga', $i)
                                     ->update(['views' => $detail[15]]);
        }
    }

    public function detailSpoilerImage(){
        for ($i=1000; $i <= 1000; $i++) { 
            $no = 1;
            $mangalist = DB::table('manga')->select('id_manga', 'link_manga')->where('id_manga', $i)->get();

            $crawler = Goutte::request('GET', $mangalist[0]->link_manga);

            $image = $crawler->filter('.ls1 img')->each(function ($node) {
                return str_replace(array('16.5', '25'), array('165', '250'), $node->extract(array('src'))[0]);
            });
            
            foreach($image as $imageList){
                
                DB::table('spoiler_image')->insert([
                    'nomor_spoiler_image' => $no, 
                    'link_spoiler_image' => $imageList,
                    'id_manga' => $mangalist[0]->id_manga
                ]);

                $no = $no + 1;
            }
        }
    }

    // GAMBAR UTAMA
    public function detailImage($awal, $akhir){
        for ($i=$awal; $i <= $akhir; $i++) { 
            
            $mangalist = DB::table('manga')->select('id_manga', 'slug_manga', 'link_manga')->where('id_manga', $i)->get();

            $crawler = Goutte::request('GET', $mangalist[0]->link_manga);

            $image = $crawler->filter('.ims img')->each(function ($node) {
                return $node->attr("src");
            });
            
            Storage::put('public/komik/sampul_detail/'.$mangalist[0]->slug_manga.'.jpg', file_get_contents($image[0]));
            echo $i. " ".$mangalist[0]->slug_manga. " ".$image[0]."<br>";
        }
    }

    // GAMBAR BACKGROUND
    public function detailImageBackground($awal, $akhir){
        for ($i=$awal; $i <= $akhir; $i++) { 
            
            $mangalist = DB::table('manga')->select('id_manga', 'slug_manga', 'link_manga')->where('id_manga', $i)->get();

            $crawler = Goutte::request('GET', $mangalist[0]->link_manga);

            $imageBackground = $crawler->filter('style')->each(function ($node) {
                return $node->html();
            });
            
            $url = explode(");}}", explode("url(", $imageBackground[0])[1])[0];
            
            Storage::put('public/komik/background_detail/'.$mangalist[0]->slug_manga.'.jpg', file_get_contents($url));
            echo $i. " ".$mangalist[0]->slug_manga. " ".$url."<br>";
        }
    }

     // GAMBAR BACKGROUND
     public function daftarKomikImage($id_manga){
    
        $crawler = Goutte::request('GET', 'https://komiku.co.id/daftar-komik/');

        $daftarImage = $crawler->filter('.ranking1 img')->each(function ($node) {
            return $node->attr("data-src");
        });       
        
        // echo $i. " ".$mangalist[0]->slug_manga. " ".$url."<br>";
        
        foreach ($daftarImage as $key => $daftarImageList) {
           $id = $key + 1;
            if ($id >= $id_manga) {
                $mangalist = DB::table('manga')->select('id_manga', 'slug_manga', 'link_manga')
                                               ->where('id_manga', $id)
                                               ->get();

                Storage::put('public/komik/daftarKomikImage/'.$mangalist[0]->slug_manga.'.jpg', file_get_contents($daftarImageList));
                echo $id.$mangalist[0]->slug_manga."<br>";
            }
        }
    }

    public function detailGenre($awal, $akhir){
        
        for ($i=$awal; $i <= $akhir; $i++) { 
            
            $mangalist = DB::table('manga')->select('id_manga', 'slug_manga', 'link_manga')->where('id_manga', $i)->get();

            $crawler = Goutte::request('GET', $mangalist[0]->link_manga);

            $genre = $crawler->filter('.genre')->each(function ($node) {
                return $node->text();
            });

            foreach($genre as $key => $genreList){
                if($key != 0){
                    echo $mangalist[0]->id_manga." ".$genreList."<br>";
                }
            }
        }
    }



    // OTHER
    public function otherMangaBerwarna($page){
        $crawler = Goutte::request('GET', 'https://komiku.co.id/other/berwarna/page/'.$page);

        $manga = $crawler->filter('h3')->each(function ($node) {
            return $node->text();
        });

        foreach($manga as $mangaList){
            $namaMangaCount = DB::table('manga')->select('id_manga', 'nama_manga')->where('nama_manga', $mangaList)->count();
            
            if($namaMangaCount != 0){
                $namaManga = DB::table('manga')->select('id_manga', 'nama_manga')->where('nama_manga', $mangaList)->get();
                
                DB::table('other')->where('id_other_manga', $namaManga[0]->id_manga)
                                     ->update(['berwarna' => 1]);
                echo $namaManga[0]->id_manga."<br>";
            }
            
        }
    }

    // OTHER REKOMENDASI
    public function otherMangaRekomendasi($page){
        $crawler = Goutte::request('GET', 'https://komiku.co.id/other/rekomendasi/page/'.$page);

        $manga = $crawler->filter('h3')->each(function ($node) {
            return $node->text();
        });

        foreach($manga as $mangaList){
            $namaMangaCount = DB::table('manga')->select('id_manga', 'nama_manga')->where('nama_manga', $mangaList)->count();
            
            if($namaMangaCount != 0){
                $namaManga = DB::table('manga')->select('id_manga', 'nama_manga')->where('nama_manga', $mangaList)->get();
                
                DB::table('other')->where('id_other_manga', $namaManga[0]->id_manga)
                                     ->update(['rekomendasi' => 1]);
                echo $namaManga[0]->id_manga."<br>";
            }
        }
    }

    // OTHER HOT
    public function otherMangaHot($page){
        $crawler = Goutte::request('GET', 'https://komiku.co.id/other/hot/page/'.$page);

        $manga = $crawler->filter('h3')->each(function ($node) {
            return $node->text();
        });

        foreach($manga as $mangaList){
            $namaMangaCount = DB::table('manga')->select('id_manga', 'nama_manga')->where('nama_manga', $mangaList)->count();
            
            if($namaMangaCount != 0){
                $namaManga = DB::table('manga')->select('id_manga', 'nama_manga')->where('nama_manga', $mangaList)->get();
                
                DB::table('other')->where('id_other_manga', $namaManga[0]->id_manga)
                                     ->update(['hot' => 1]);
                echo $namaManga[0]->id_manga."<br>";
            }
        }
    }
}
