<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;

class MangaController extends Controller
{

    public function index(){
        $page_title = "Komik Terbaru";
        $web_description = "Baca Komik Terbaru 2020 di Mangajaya. Semua komik, Manhua, Manhwa, dan Manga di Mangajaya diterjemahkan dalam bahasa Indonesia.";

        $manga = DB::table('chapter')->join('manga', 'chapter.id_manga', '=', 'manga.id_manga')
                                     ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                     ->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                     ->orderBy('chapter.updated_at', 'DESC')
                                     ->get();

        return view('newManga')->with([
                                        'page_title' => $page_title,
                                        'web_description' => $web_description,
                                        'manga' => $manga
                                       ]);
    }

    public function newMangaFilterKategori($nama_kategori){
        $page_title = "Komik Terbaru";
        $web_description = "Baca Komik Terbaru 2020 di Mangajaya. Semua komik, Manhua, Manhwa, dan Manga di Mangajaya diterjemahkan dalam bahasa Indonesia.";

        $manga = DB::table('chapter')->join('manga', 'chapter.id_manga', '=', 'manga.id_manga')
                                     ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                     ->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                     ->where('jenis_manga', $nama_kategori)
                                     ->orderBy('chapter.updated_at', 'DESC')
                                     ->get();

        return view('newManga')->with([
                                        'page_title' => $page_title,
                                        'web_description' => $web_description,
                                        'manga' => $manga
                                       ]);
    }


    // DAFTAR KOMIK LANDING PAGE
    public function daftarManga(){
        $page_title = "Daftar Komik";
        $web_description = "Daftar Komik terlengkap yang tersedia di Mangajaya, semua berbahasa Indonesia dengan kualitas gambar HD.";

        $char = array('.', '+', '0', '1', '2', '4', '6', '7', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W' );
        foreach ($char as $abjad) {
            $manga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                         ->where('nama_manga', 'like', $abjad.'%')
                                         ->get();
        }

        return view('daftarManga')->with([
                                            'page_title' => $page_title,
                                            'web_description' => $web_description,
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
        
        $chapterManga = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                            ->select('slug_manga', 'nama_manga', 'episode_chapter', 'judul_chapter', 'chapter.updated_at')
                                            ->where('manga.slug_manga', $slug_manga)
                                            ->orderBy('episode_chapter', 'DESC')
                                            ->get();
        
        $similarManga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                          ->where('konsep_cerita', $detailManga[0]->konsep_cerita)
                                          ->where('jenis_manga', $detailManga[0]->jenis_manga)
                                          ->where('manga.id_manga', '!=', $detailManga[0]->id_manga)
                                          ->limit(3)
                                          ->get();

        $maxChapterManga = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                               ->where('manga.slug_manga', $slug_manga)
                                               ->max('episode_chapter');

        $minChapterManga = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                               ->where('manga.slug_manga', $slug_manga)
                                               ->min('episode_chapter');
        
        $page_title = $detailManga[0]->nama_manga;
        $web_description = "Baca Komik ".$detailManga[0]->nama_manga." bahasa Indonesia di Mangajaya. ".$detailManga[0]->jenis_manga." ".$detailManga[0]->judul_indo." bercerita tentang ".$detailManga[0]->judul_indo." ".explode('</li>', explode('<ul class="rs"> <li>', str_replace('<ul class="rs"><li>', '<ul class="rs"> <li>', $detailManga[0]->sinopsis))[1])[0];
        
        return view('detailManga')->with([
                                            'page_title' => $page_title,
                                            'web_description' => $web_description,
                                            'detailManga' => $detailManga[0],
                                            'spoilerImageManga' => $spoilerImageManga,
                                            'detailKategoriManga' => $detailKategoriManga,
                                            'chapterManga' => $chapterManga,
                                            'similarManga' => $similarManga,
                                            'maxChapterManga' => $maxChapterManga,
                                            'minChapterManga' => $minChapterManga,                                    
                                        ]);
    }

    // DETAIL CHAPTER (READER AREA)
    public function detailChapter($slug_manga, $episode_chapter){

        $detail_chapter = DB::table('gambar')->join('chapter', 'chapter.id_chapter', '=', 'gambar.id_chapter')
                                             ->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                             ->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                             ->where('manga.slug_manga', '=', $slug_manga)
                                             ->where('chapter.episode_chapter', $episode_chapter)
                                             ->get();
        
        $detail_kategori = DB::table('manga')->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                             ->select('nama_manga', 'jenis_manga', 'manga.updated_at', 'slug_manga')
                                             ->where('konsep_cerita', $detail_chapter[0]->konsep_cerita)
                                             ->where('manga.id_manga', '!=', $detail_chapter[0]->id_manga)
                                             ->orderBy('manga.updated_at', 'DESC')
                                             ->limit(4)
                                             ->get();

        $maxChapterManga = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                               ->where('manga.slug_manga', $slug_manga)
                                               ->max('episode_chapter');

        $minChapterManga = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                               ->where('manga.slug_manga', $slug_manga)
                                               ->min('episode_chapter');
 
        $negara =   $detail_chapter[0]->jenis_manga == 'Manga' ? 'Jepang' : 
                        ($detail_chapter[0]->jenis_manga == 'Manhua' ? 'China' : 'Korea');

        $footerChapter =  DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
                                             ->select('nama_manga', 'slug_manga', 'judul_chapter', 'chapter.updated_at', 'episode_chapter')
                                             ->where('manga.slug_manga', $slug_manga)
                                             ->orderBy('chapter.updated_at', 'DESC')
                                             ->limit(4)
                                             ->get();
                                            

        $page_title = "Komik ".$detail_chapter[0]->nama_manga." ".$detail_chapter[0]->judul_chapter;
        $web_description = "Baca Komik ".$detail_chapter[0]->nama_manga." ".$detail_chapter[0]->judul_chapter." dalam bahasa Indonesia di Mangajaya! ".$detail_chapter[0]->nama_manga." ".$detail_chapter[0]->judul_chapter.".";
        
        return view('detailChapter')->with([
                                                'page_title' => $page_title,
                                                'web_description' => $web_description,
                                                'detail_manga' => $detail_chapter[0],
                                                'gambar' => $detail_chapter,
                                                'detail_kategori' => $detail_kategori,
                                                'negara' => $negara,
                                                'maxChapterManga' => $maxChapterManga,
                                                'minChapterManga' => $minChapterManga,
                                                'footerChapter' => $footerChapter,
                                            ]);
    }


    // KATEGORI / GENRE
    public function daftarMangaFilterKategori($nama_kategori){
        $page_title = "Daftar Komik";
        $web_description = "Daftar Komik terlengkap yang tersedia di Mangajaya, semua berbahasa Indonesia dengan kualitas gambar HD.";

        $char = array('.', '+', '0', '1', '2', '4', '6', '7', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W');
        foreach ($char as $abjad) {
            $manga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                         ->where('nama_manga', 'like', $abjad.'%')
                                         ->where('jenis_manga', '=', $nama_kategori)
                                         ->get();
        }

        return view('daftarManga')->with([
                                            'page_title' => $page_title,
                                            'web_description' => $web_description,
                                            'char' => $char,
                                            'manga' => $manga
                                        ]);
    }

    public function daftarGenre(){
        $page_title = "Dafter Genre Komik";
        $web_description = "Genre Komik Terbaru dan Terpopuler di Mangajaya";

        $kategori = DB::table('kategori')->get();

        return view('daftarGenre')->with([
                                            'page_title' => $page_title,
                                            'web_description' => $web_description,
                                            'kategori' => $kategori,
                                        ]);
    }

    public function detailGenre($slug_genre){
        $detailKategoriManga = DB::table('detail_kategori')->join('kategori', 'detail_kategori.id_kategori', '=', 'kategori.id_kategori')
                                                           ->join('manga', 'detail_kategori.id_manga', '=', 'manga.id_manga')
                                                           ->join('detail_manga', 'detail_manga.id_manga', '=', 'manga.id_manga')
                                                           ->where('slug_kategori', $slug_genre)
                                                           ->get();

        $page_title = "Komik Genre ".$detailKategoriManga[0]->nama_kategori;
        $web_description = "Baca Komik ".$detailKategoriManga[0]->nama_kategori." Bahasa Indonesia. Berikut merupakan daftar manga Genre ".$detailKategoriManga[0]->nama_kategori." terbaik terbaru terlengkap terpopuler di Mangajaya.";

        return view('detailGenre')->with([
                                            'page_title' => $page_title,
                                            'web_description' => $web_description,
                                            'detailKategoriManga' => $detailKategoriManga,
                                        ]);;

    }
}