<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use DB;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
    	Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
        
        $web_title = DB::table('setting')->select('deskripsi_setting')
                                         ->where('jenis_setting', 'web_title')
                                         ->get();

        View::share('web_title', $web_title[0]->deskripsi_setting);
    }
}