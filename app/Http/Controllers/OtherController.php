<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OtherController extends Controller
{
    public function detaiOtherHot(){
        $title = "Hot";
        $page_title = "Komik Tambahan Hot";
        $web_description = "Baca Komik Tambahan Hot Bahasa Indonesia. Berikut merupakan daftar manga Tambahan Hot terbaik terbaru terlengkap terpopuler di Mangajaya.";
        
        $manga = DB::table('manga')->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                      ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                      ->where('hot', 1)
                                      ->get();
        
        return view('other.detailOther')->with([    
                                                    'page_title' => $page_title,
                                                    'web_description' => $web_description,
                                                    'title' => $title,
                                                    'manga' => $manga,
                                                ]);
    }

    public function detaiOtherRekomendasi(){
        $title = "Rekomendasi";
        $page_title = "Komik Tambahan Rekomendasi";
        $web_description = "Baca Komik Tambahan Rekomendasi Bahasa Indonesia. Berikut merupakan daftar manga Tambahan Rekomendasi terbaik terbaru terlengkap terpopuler di Mangajaya.";

        $manga = DB::table('manga')->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                   ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                   ->where('rekomendasi', 1)
                                   ->get();
        
        return view('other.detailOther')->with([    
                                                    'page_title' => $page_title,
                                                    'web_description' => $web_description,
                                                    'title' => $title,
                                                    'manga' => $manga,
                                                ]);
    }

    public function detaiOtherBerwarna(){
        $title = "Berwarna";
        $page_title = "Komik Tambahan Berwarna";
        $web_description = "Baca Komik Tambahan Berwarna Bahasa Indonesia. Berikut merupakan daftar manga Tambahan Berwarna terbaik terbaru terlengkap terpopuler di Mangajaya.";

        $manga = DB::table('manga')->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                   ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                   ->where('berwarna', 1)
                                   ->get();
        
        return view('other.detailOther')->with([    
                                                    'page_title' => $page_title,
                                                    'web_description' => $web_description,
                                                    'title' => $title,
                                                    'manga' => $manga,
                                                ]);
    }
}