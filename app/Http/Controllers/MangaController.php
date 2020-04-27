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

    public function index(){
        $manga = DB::table('chapter')->join('manga', 'chapter.id_manga', '=', 'manga.id_manga')
                                     ->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                     ->join('other', 'manga.id_manga', '=', 'other.id_manga')
                                     ->orderBy('chapter.updated_at', 'DESC')
                                     ->get();

        // echo "<pre>";
        // var_dump($manga);
        // echo "</pre>";
        return view('newManga')->with([
                                        'manga' => $manga
                                       ]);
    }

    public function daftarManga(){
        $char = array('.', '+', '0', '1', '2', '4', '6', '7', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W' );
        foreach ($char as $abjad) {
            $manga[] = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                         ->where('nama_manga', 'like', $abjad.'%')
                                         ->get();
        }

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
        
        $chapterManga = DB::table('chapter')->join('manga', 'manga.id_manga', '=', 'chapter.id_manga')
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
                    
        // echo "<pre>";
        // var_dump($chapterManga);
        // echo "</pre>";
        return view('detailManga')->with([
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
        // echo "<pre>";
        // var_dump($detail_kategori);
        // echo "</pre>";
        $negara =   $detail_chapter[0]->jenis_manga == 'Manga' ? 'Jepang' : 
                        ($detail_chapter[0]->jenis_manga == 'Manhua' ? 'China' : 'Korea');
        
        
        return view('detailChapter')->with([
                                                'detail_manga' => $detail_chapter[0],
                                                'gambar' => $detail_chapter,
                                                'detail_kategori' => $detail_kategori,
                                                'negara' => $negara,
                                                // 'detailKategoriManga' => $detailKategoriManga,
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
                                            'detailKategoriManga' => $detailKategoriManga,
                                        ]);;

        // echo "<pre>";
        // var_dump($detailKategoriManga);
        // echo "</pre>";
    }
}
