<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function() {
    return view('welcome');
});

// melakukan grab pada daftar manga (DB MANGA)
Route::get('/grab/daftarmanga', 'GrabController@daftarManga');
// melakukan grab pada detail manga (DB DETAIL MANGA)
Route::get('/grab/detaildaftarmanga', 'GrabController@detailDaftarManga');
// melakukan grab pada detail spoiler image (DB SPOILER IMAGE)
Route::get('/grab/detailspoilerimage', 'GrabController@detailSpoilerImage');

// DAFTAR KOMIK
Route::get('/daftar-komik', 'MangaController@daftarManga');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\AdminController@index')->name('admin');

