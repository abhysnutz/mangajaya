<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function detailCategoryManga(){
        $title = "Manga";
        $description = "Manga (漫画 manga) adalah komik atau novel grafis yang dibuat di Jepang atau oleh orang yang menggunakan bahasa Jepang dan sesuai dengan gaya yang dikembangkan di Jepang pada akhir abad ke-19. Mereka memiliki pra-sejarah yang panjang dan kompleks dalam seni Jepang sebelumnya.";
        $negara = "Jepang";

        $manga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                    ->where('jenis_manga', 'Manga')
                                    ->orderBy('views', 'DESC')
                                    ->get();

        // VIEWS TERBANYAK
        $terpopuler = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                        ->where('jenis_manga', 'Manga')
                                        ->orderBy('detail_manga.views', 'DESC')
                                        ->limit(1)
                                        ->get();

        // MANGA UDPATE HARI INI
        $mangaToday = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                        ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                        ->where('jenis_manga', 'Manga')
                                        ->whereDay('manga.updated_at', date('d'))
                                        ->orderBy('manga.updated_at', 'DESC')
                                        ->limit(12)
                                        ->get();

        // MANGA BY GENRE
        $isekaiGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->join('detail_kategori', 'detail_kategori.id_manga', '=', 'manga.id_manga')
                                         ->join('kategori', 'kategori.id_kategori', '=', 'detail_kategori.id_kategori')
                                         ->where('jenis_manga', 'Manga')
                                         ->where('nama_kategori', 'Isekai')
                                         ->limit(8)
                                         ->get();

        $romanceGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->join('detail_kategori', 'detail_kategori.id_manga', '=', 'manga.id_manga')
                                         ->join('kategori', 'kategori.id_kategori', '=', 'detail_kategori.id_kategori')
                                         ->where('jenis_manga', 'Manga')
                                         ->where('nama_kategori', 'Romance')
                                         ->limit(8)
                                         ->get();

        // MANGA REKOMENDASI
        $rekomendasi = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manga')
                                         ->where('rekomendasi', 1)
                                         ->orderBy('detail_manga.views', 'DESC')
                                         ->limit(11)
                                         ->get();
        
        return view('category.detailCategory')->with([    
                                                        'title' => $title,
                                                        'description' => $description,
                                                        'manga' => $manga,
                                                        'negara' => $negara,
                                                        'terpopuler' => $terpopuler[0],
                                                        'mangaToday' => $mangaToday,
                                                        'rekomendasi' => $rekomendasi,
                                                        'isekaiGenre' => $isekaiGenre,
                                                        'romanceGenre' => $romanceGenre,
                                                    ]);

        // echo "<pre>";
        // var_dump($isekaiGenre);
        // echo "</pre>";
    }
}
