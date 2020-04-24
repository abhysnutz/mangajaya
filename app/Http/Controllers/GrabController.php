<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use DB;
use Storage;

class GrabController extends Controller
{
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
        // echo "<pre>";
        // var_dump($image);
        // echo "</pre>";
        
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

        // echo "<pre>";
        // var_dump($url);
        // echo "</pre>";
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
                $mangalist = DB::table('manga')->select('id_manga', 'slug_manga', 'link_manga')->where('id_manga', $id)->get();

                Storage::put('public/komik/daftarKomikImage/'.$mangalist[0]->slug_manga.'.jpg', file_get_contents($daftarImageList));
                echo $id.$mangalist[0]->slug_manga."<br>";
            }

        }
        
    }

}
