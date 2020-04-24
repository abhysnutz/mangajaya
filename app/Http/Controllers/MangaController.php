<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MangaController extends Controller
{
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
        $manga_detail = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                          ->where('slug_manga', $slug_manga)
                                          ->get();

        echo "<pre>";
        var_dump($manga_detail);
        echo "</pre>";
    }


    // KATEGORI
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
                                        ]);;
    }

    
}
