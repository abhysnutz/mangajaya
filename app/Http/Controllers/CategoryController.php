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
                                         ->where('jenis_manga', 'Manga')
                                         ->where('konsep_cerita', 'Isekai')
                                         ->limit(8)
                                         ->get();

        $romanceGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manga')
                                         ->where('konsep_cerita', 'Romantis')
                                         ->limit(8)
                                         ->get();

        // MANGA BY STATUS
        $endStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manga')
                                         ->where('status_manga', 'End')
                                         ->limit(8)
                                         ->get();

        $onGoingStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                           ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                           ->where('jenis_manga', 'Manga')
                                           ->where('status_manga', 'Ongoing')
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
                                                        'endStatus' => $endStatus,
                                                        'onGoingStatus' => $onGoingStatus,
                                                    ]);

    }


    public function detailCategoryManhua(){
        $title = "Manhua";
        $description = "Manhua (漫画) adalah sebutan untuk komik cina atau berbahasa Mandarin yang dibuat di Tiongkok Daratan, Hong Kong, dan Taiwan.";
        $negara = "China";

        $manga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                    ->where('jenis_manga', 'Manhua')
                                    ->orderBy('views', 'DESC')
                                    ->get();

        // VIEWS TERBANYAK
        $terpopuler = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                        ->where('jenis_manga', 'Manhua')
                                        ->orderBy('detail_manga.views', 'DESC')
                                        ->limit(1)
                                        ->get();

        // MANGA UDPATE HARI INI
        $mangaToday = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                        ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                        ->where('jenis_manga', 'Manhua')
                                        ->whereDay('manga.updated_at', date('d'))
                                        ->orderBy('manga.updated_at', 'DESC')
                                        ->limit(12)
                                        ->get();

        // MANGA BY GENRE
        $isekaiGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhua')
                                         ->where('konsep_cerita', 'Isekai')
                                         ->limit(8)
                                         ->get();

        $romanceGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhua')
                                         ->where('konsep_cerita', 'Romantis')
                                         ->limit(8)
                                         ->get();

        // MANGA BY STATUS
        $endStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhua')
                                         ->where('status_manga', 'End')
                                         ->limit(8)
                                         ->get();

        $onGoingStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                           ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                           ->where('jenis_manga', 'Manhua')
                                           ->where('status_manga', 'Ongoing')
                                           ->limit(8)
                                           ->get();

        // MANGA REKOMENDASI
        $rekomendasi = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhua')
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
                                                        'endStatus' => $endStatus,
                                                        'onGoingStatus' => $onGoingStatus,
                                                    ]);

    }

    public function detailCategoryManhwa(){
        $title = "Manhwa";
        $description = "Manhwa (만화) ialah istilah dalah bahasa Korea untuk menyebut komik. Di luar wilayah Korea, istilah manhwa mengacu pada komik buatan Korea.";
        $negara = "Korea";

        $manga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                    ->where('jenis_manga', 'Manhwa')
                                    ->orderBy('views', 'DESC')
                                    ->get();

        // VIEWS TERBANYAK
        $terpopuler = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                        ->where('jenis_manga', 'Manhwa')
                                        ->orderBy('detail_manga.views', 'DESC')
                                        ->limit(1)
                                        ->get();

        // MANGA UDPATE HARI INI
        $mangaToday = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                        ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                        ->where('jenis_manga', 'Manhwa')
                                        ->whereDay('manga.updated_at', date('d'))
                                        ->orderBy('manga.updated_at', 'DESC')
                                        ->limit(12)
                                        ->get();

        // MANGA BY GENRE
        $isekaiGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhwa')
                                         ->where('konsep_cerita', 'Isekai')
                                         ->limit(8)
                                         ->get();

        $romanceGenre = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhwa')
                                         ->where('konsep_cerita', 'Romantis')
                                         ->limit(8)
                                         ->get();

        // MANGA BY STATUS
        $endStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhwa')
                                         ->where('status_manga', 'End')
                                         ->limit(8)
                                         ->get();

        $onGoingStatus = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                           ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                           ->where('jenis_manga', 'Manhwa')
                                           ->where('status_manga', 'Ongoing')
                                           ->limit(8)
                                           ->get();

        // MANGA REKOMENDASI
        $rekomendasi = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                         ->join('other', 'other.id_manga', '=', 'manga.id_manga')
                                         ->where('jenis_manga', 'Manhwa')
                                         ->where('rekomendasi', 1)
                                         ->orderBy('detail_manga.views', 'DESC')
                                         ->limit(10)
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
                                                        'endStatus' => $endStatus,
                                                        'onGoingStatus' => $onGoingStatus,
                                                    ]);

    }
}
