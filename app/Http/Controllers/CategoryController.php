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
        $page_title = "Baca Manga (Komik Jepang)";
        $web_description = "Baca Manga (Komik Jepang) bahasa Indonesia di Mangajaya. Manga (漫画 manga) adalah komik atau novel grafis yang dibuat di Jepang atau oleh orang yang menggunakan bahasa Jepang.";

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
        $id_mangaNewManga = DB::table('manga')->select('manga.id_manga', 'slug_manga')
                                              ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                              ->where('jenis_manga', 'Manga')
                                              ->orderBy('manga.updated_at', 'DESC')
                                              ->limit(12)
                                              ->get();

        foreach ($id_mangaNewManga as $value) {
            $mangaToday[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                            ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                            ->select('manga.id_manga', 'manga.updated_at', 'nama_manga', 'slug_manga', 'konsep_cerita', 'jenis_manga', 'views', 'episode_chapter', 'judul_chapter')
                                            ->where('manga.id_manga', $value->id_manga)
                                            ->orderBy('chapter.updated_at', 'DESC')
                                            ->limit(1)
                                            ->get();
        }

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
                                                        'page_title' => $page_title,
                                                        'web_description' => $web_description,
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
        $page_title = "Baca Manhua (Komik China)";
        $web_description = "Baca Manhua (Komik China) bahasa Indonesia di Mangajaya. Manhua adalah sebutan untuk komik cina atau berbahasa Mandarin yang dibuat di Tiongkok Daratan, Hong Kong, dan Taiwan.";

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
        $id_mangaNewManga = DB::table('manga')->select('manga.id_manga', 'slug_manga')
                                              ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                              ->where('jenis_manga', 'Manhua')
                                              ->orderBy('manga.updated_at', 'DESC')
                                              ->limit(12)
                                              ->get();

        foreach ($id_mangaNewManga as $value) {
            $mangaToday[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                            ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                            ->select('manga.id_manga', 'manga.updated_at', 'nama_manga', 'slug_manga', 'konsep_cerita', 'jenis_manga', 'views', 'episode_chapter', 'judul_chapter')
                                            ->where('manga.id_manga', $value->id_manga)
                                            ->orderBy('chapter.updated_at', 'DESC')
                                            ->limit(1)
                                            ->get();
        }

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
                                                        'page_title' => $page_title,
                                                        'web_description' => $web_description,
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
        $page_title = "Baca Manhwa (Komik Korea)";
        $web_description = "Baca Manhwa (Komik Korea) bahasa Indonesia di Mangajaya. Manhwa adalah istilah dalah bahasa Korea untuk menyebut komik. Di luar wilayah Korea, istilah manhwa mengacu pada komik buatan Korea.";

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
        $id_mangaNewManga = DB::table('manga')->select('manga.id_manga', 'slug_manga')
                                              ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                              ->where('jenis_manga', 'Manhwa')
                                              ->orderBy('manga.updated_at', 'DESC')
                                              ->limit(12)
                                              ->get();

        foreach ($id_mangaNewManga as $value) {
            $mangaToday[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                            ->join('chapter', 'chapter.id_manga', '=', 'manga.id_manga')
                                            ->select('manga.id_manga', 'manga.updated_at', 'nama_manga', 'slug_manga', 'konsep_cerita', 'jenis_manga', 'views', 'episode_chapter', 'judul_chapter')
                                            ->where('manga.id_manga', $value->id_manga)
                                            ->orderBy('chapter.updated_at', 'DESC')
                                            ->limit(1)
                                            ->get();
        }

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
                                                        'page_title' => $page_title,
                                                        'web_description' => $web_description,
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