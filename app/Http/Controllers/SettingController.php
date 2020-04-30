<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function privacyPolicy(){
        $page_title = "Privacy Policy";
        $web_description = "Privacy Policy";
        $konten = DB::table('setting')->where('jenis_setting', 'privacy-policy')
                                      ->get();
        
        return view('setting')->with([    
                                        'page_title' => $page_title,
                                        'web_description' => $web_description,
                                        'konten' => $konten[0],
                                    ]);
    }

    public function contactUs(){
        
    }

    public function disclaimer(){
        $page_title = "Disclaimer";
        $web_description = "Disclaimer";
        $konten = DB::table('setting')->where('jenis_setting', 'disclaimer')
                                      ->get();
        
        return view('setting')->with([    
                                        'page_title' => $page_title,
                                        'web_description' => $web_description,
                                        'konten' => $konten[0],
                                    ]);
    }

    public function dmca(){
        $page_title = "DMCA";
        $web_description = "DMCA";
        $konten = DB::table('setting')->where('jenis_setting', 'dmca')
                                      ->get();
        
        return view('setting')->with([    
                                        'page_title' => $page_title,
                                        'web_description' => $web_description,
                                        'konten' => $konten[0],
                                    ]);
    }
}
