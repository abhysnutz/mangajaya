<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class HomeController extends Controller
{
    public function __construct()
    {
        $web_title = 'Manga Jaya';

        View::share('web_title', $web_title);
    }
    
    public function index()
    {
        $manga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                    ->orderBy('views', 'DESC')
                                    ->get();

        $hotManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                      ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                      ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                      ->where('hot', 1)
                                      ->limit(8)
                                      ->get();

        $newManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                      ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                      ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                      ->orderBy('manga.updated_at', 'DESC')
                                      ->limit(12)
                                      ->get();

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
                                        'hotManga' =>$hotManga,
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
}
