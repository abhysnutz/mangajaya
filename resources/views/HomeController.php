<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class HomeController extends Controller
{
    
    public function index(){

        $page_title = "Baca Komik Gratis Bahasa Indonesia";
        $web_description = "Mangajaya adalah website preview baca komik online gratis berbahasa Indonesia. Kalian bisa membaca preview Komik Jepang, Komik Korea, dan Komik China secara gratis di Mangajaya!";

        $manga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                    ->orderBy('views', 'DESC')
                                    ->get();

        $idHotManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                        ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                        ->where('hot', 1)
                                        ->limit(8)
                                        ->get();

        foreach($idHotManga as $valueHot){
            $hotManga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                            ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                            ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                            ->where('manga.id_manga', $valueHot->id_manga)
                                            ->orderBy('episode_chapter', 'DESC')
                                            ->limit(1)
                                            ->get();
        }

        // NEW MANGA
        $id_mangaNewManga = DB::table('manga')->select('manga.id_manga')
                                      ->orderBy('manga.updated_at', 'DESC')
                                      ->limit(12)
                                      ->get();

        foreach ($id_mangaNewManga as $value) {
            $newManga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                            ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                            ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                            ->select('manga.id_manga', 'manga.updated_at', 'nama_manga', 'slug_manga', 'konsep_cerita', 'berwarna', 'hot', 'jenis_manga', 'views', 'episode_chapter', 'judul_chapter')
                                            ->where('manga.id_manga', $value->id_manga)
                                            ->orderBy('chapter.updated_at', 'DESC')
                                            ->limit(1)
                                            ->get();
        }
        // END NEW MANGA

        $fantasiManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                          ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                          ->where('konsep_cerita', 'Fantasi')
                                          ->orderBy('manga.updated_at', 'DESC')
                                          ->limit(8)
                                          ->get();

        $isekaiManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                          ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                          ->where('konsep_cerita', 'Isekai')
                                          ->orderBy('manga.updated_at', 'DESC')
                                          ->limit(8)
                                          ->get();

        $romantisManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                          ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                          ->where('konsep_cerita', 'Romantis')
                                          ->orderBy('manga.updated_at', 'DESC')
                                          ->limit(8)
                                          ->get();

        // MANGA BY STATUS
        $endStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                       ->where('status_manga', 'End')
                                       ->limit(8)
                                       ->get();

        $onGoingStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                           ->where('status_manga', 'Ongoing')
                                           ->limit(8)
                                           ->get();

        // MANGA REKOMENDASI
        $rekomendasi = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('rekomendasi', 1)
                                         ->orderBy('detail_manga.views', 'DESC')
                                         ->limit(12)
                                         ->get();

        return view('home')->with([    
                                        'page_title' => $page_title,
                                        'web_description' => $web_description,
                                        'hotManga' => $hotManga,
                                        'manga' => $manga,
                                        'newManga' => $newManga,
                                        'fantasiManga' => $fantasiManga,
                                        'isekaiManga' => $isekaiManga,
                                        'romantisManga' => $romantisManga,
                                        'endStatus' => $endStatus,
                                        'onGoingStatus' => $onGoingStatus,
                                        'rekomendasi' => $rekomendasi,
                                  
                                    ]);
    }

    // SEARCHING
    public function searching(Request $request){

    // menangkap data pencarian
    $cari = $request->cari;

        $mangaSearch = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->where('nama_manga','like',"%".$cari."%")
                                         ->get();
        
        $page_title = "Hasil Pencarian ".$cari;
        $web_description = "Pencarian Hasil Pencarian ".$cari;
        
    return view('searching')->with([    
                                            'page_title' => $page_title,
                                            'web_description' => $web_description,
                                            'cari' => $cari,
                                            'mangaSearch' => $mangaSearch,
                                        ]);
  }
}