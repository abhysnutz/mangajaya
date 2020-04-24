<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class MangaController extends Controller
{
    public function __construct()
    {
        $web_title = 'komik abhy';

        View::share('web_title', $web_title);
    }

    public function daftarManga(){
        $char = array('.', '+', '0', '1', '2', '4', '6', '7', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W' );
        foreach ($char as $abjad) {
            $manga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                         ->where('nama_manga', 'like', $abjad.'%')
                                         ->get();
        }
        // echo "<pre>";
        // var_dump($manga);
        // echo "</pre>";

        return view('daftarManga')->with([
                                            'char' => $char,
                                            'manga' => $manga
                                        ]);
    }

    // DETAIL MANGA
    public function detailManga($slug_manga){




        $detailManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                          ->where('slug_manga', $slug_manga)
                                          ->get();

        $spoilerImageManga = DB::table('spoiler_image')->join('manga', 'spoiler_image.id_manga', '=', 'manga.id_manga')        
                                                       ->where('slug_manga', $slug_manga)
                                                       ->limit(4)
                                                       ->get();

        $detailKategoriManga = DB::table('detail_kategori')->join('kategori', 'detail_kategori.id_kategori', '=', 'kategori.id_kategori')
                                                           ->join('manga', 'detail_kategori.id_manga', '=', 'manga.id_manga')
                                                           ->select('nama_kategori', 'slug_kategori')
                                                           ->where('slug_manga', $slug_manga)
                                                           ->get();
        // echo "<pre>";
        // var_dump($spoilerImageManga);
        // echo "</pre>";
        return view('detailManga')->with([
                                            'detailManga' => $detailManga[0],
                                            'spoilerImageManga' => $spoilerImageManga,
                                            'detailKategoriManga' => $detailKategoriManga,
                                        ]);
    }

    // KATEGORI / GENRE
    public function daftarMangaFilterKategori($nama_kategori){
        $char = array('.', '+', '0', '1', '2', '4', '6', '7', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W');
        foreach ($char as $abjad) {
            $manga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                         ->where('nama_manga', 'like', $abjad.'%')
                                         ->where('jenis_manga', '=', $nama_kategori)
                                         ->get();
        }

        return view('daftarManga')->with([
                                            'char' => $char,
                                            'manga' => $manga
                                        ]);
    }

    public function daftarGenre(){
        $kategori = DB::table('kategori')->get();

        return view('daftarGenre')->with([
                                            'kategori' => $kategori,
                                        ]);
    }

    public function detailGenre($slug_genre){
        $detailKategoriManga = DB::table('detail_kategori')->join('kategori', 'detail_kategori.id_kategori', '=', 'kategori.id_kategori')
                                                           ->join('manga', 'detail_kategori.id_manga', '=', 'manga.id_manga')
                                                           ->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                                        //    ->select('nama_kategori', 'slug_kategori')
                                                           ->where('slug_kategori', $slug_genre)
                                                           ->get();

        return view('detailGenre')->with([
                                            'detailKategoriManga' => $detailKategoriManga[0],
                                        ]);;

        // echo "<pre>";
        // var_dump($detailKategoriManga);
        // echo "</pre>";
    }
}
