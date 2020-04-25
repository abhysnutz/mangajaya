<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function detailCategoryManga(){
            $title = "manga";
            $manga = DB::table('manga')->join('detail_manga', 'manga.id_manga', '=', 'detail_manga.id_manga')
                                       ->where('jenis_manga', 'Manga')
                                       ->orderBy('views', 'DESC')
                                       ->get();
            
            return view('category.detailCategory')->with([    
                                                            'title' => $title,
                                                            'manga' => $manga,
                                                        ]);

            // echo "<pre>";
            // var_dump($manga);
            // echo "</pre>";
    }
}
