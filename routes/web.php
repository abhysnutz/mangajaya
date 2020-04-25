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
// melakukan grab pada image detail
Route::get('/grab/detailimage/{awal}/{akhir}', 'GrabController@detailImage');
// melakukan grab pada daftar komik image
Route::get('/grab/daftarkomikimage/{id_manga}', 'GrabController@daftarKomikImage');
// melakukan grab pada image detail Background
Route::get('/grab/detailimagebackground/{awal}/{akhir}', 'GrabController@detailImageBackground');
// melakukan grab pada genre komik
Route::get('/grab/detailgenre/{awal}/{akhir}', 'GrabController@detailGenre');
// melakukan grab pada views manga (DB DETAIL MANGA)
Route::get('/grab/viewsdetaildaftarmanga', 'GrabController@viewsDetailDaftarManga');

// GRAB OtHER
// melakukan grab warna berwarna (DB OTHER MANGA)
Route::get('/grab/othermangaberwarna/{page}', 'GrabController@otherMangaBerwarna');
// melakukan grab warna rekomendasi (DB OTHER MANGA)
Route::get('/grab/othermangarekomendasi/{page}', 'GrabController@otherMangaRekomendasi');


// DAFTAR KOMIK BERDASARKAN KATEGORI
Route::get('/daftar-komik/kategori/{nama_kategori}', 'MangaController@daftarMangaFilterKategori');
// DAFTAR KOMIK
Route::get('/daftar-komik', 'MangaController@daftarManga');
// DETAIL KOMIK
Route::get('/manga/{slug_manga}', 'MangaController@detailManga')->name('detailManga');
// DAFTAR GENRE
Route::get('/daftar-genre', 'MangaController@daftarGenre');
// DETAIL GENRE
Route::get('/genre/{slug_genre}', 'MangaController@detailGenre')->name('detailGenre');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\AdminController@index')->name('admin');

