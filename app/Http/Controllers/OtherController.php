<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OtherController extends Controller
{
    public function detaiOtherHot(){
        $title = "Hot";
        $manga = DB::table('manga')->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                      ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                      ->where('hot', 1)
                                      ->get();
        
        return view('other.detailOther')->with([    
                                                    'title' => $title,
                                                    'manga' => $manga,
                                                ]);
    }

    public function detaiOtherRekomendasi(){
        $title = "Rekomendasi";
        $manga = DB::table('manga')->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                   ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                   ->where('rekomendasi', 1)
                                   ->get();
        
        return view('other.detailOther')->with([    
                                                    'title' => $title,
                                                    'manga' => $manga,
                                                ]);
    }

    public function detaiOtherBerwarna(){
        $title = "Berwarna";
        $manga = DB::table('manga')->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                   ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                   ->where('berwarna', 1)
                                   ->get();
        
        return view('other.detailOther')->with([    
                                                    'title' => $title,
                                                    'manga' => $manga,
                                                ]);
    }
}
