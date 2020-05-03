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

// HOME
Route::get('/', 'HomeController@index')->name('home');

// TRUNCATE
Route::get('trun', function(){
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table('detail_manga')->truncate();
    DB::table('spoiler_image')->truncate();
    DB::table('chapter')->truncate();
    DB::table('gambar')->truncate();
    DB::table('other')->truncate();
    DB::table('detail_kategori')->truncate();
    DB::table('manga')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
});


// GRAB
// GRAB INTI
// melakukan grab pada manga terbaru (DB MANGA)
Route::get('/grab/newmanga/{page?}', 'GrabController@newManga');
// melakukan grab pada halaman home komiku
Route::get('/grab/homemanga/', 'GrabController@homeManga');



// GRAB MANUAL
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

// GRAB OTHER
// melakukan grab other berwarna (DB OTHER MANGA)
Route::get('/grab/othermangaberwarna/{page}', 'GrabController@otherMangaBerwarna');
// melakukan grab other rekomendasi (DB OTHER MANGA)
Route::get('/grab/othermangarekomendasi/{page}', 'GrabController@otherMangaRekomendasi');
// melakukan grab other hot (DB OTHER MANGA)
Route::get('/grab/othermangahot/{page}', 'GrabController@otherMangaHot');


// KOMIK TERBARU
// MANGA LANDING PAGE / NEW MANGA
Route::get('/manga', 'MangaController@index');
// DAFTAR MANGA BERDASARKAN KATEGORI (MANGA LANDING PAGE)
Route::get('/manga/kategori/{nama_kategori}', 'MangaController@newMangaFilterKategori');



// DAFTAR KOMIK LANDING PAGE
// DAFTAR KOMIK BERDASARKAN KATEGORI (DAFTAR KOMIK LANDING PAGE)
Route::get('/daftar-komik/kategori/{nama_kategori}', 'MangaController@daftarMangaFilterKategori');
// DAFTAR KOMIK
Route::get('/daftar-komik', 'MangaController@daftarManga');


// DETAIL KOMIK
Route::get('/manga/{slug_manga}', 'MangaController@detailManga')->name('detailManga');
// DETAIL CHAPTER
Route::get('/manga/{slug_manga}/{episode_chapter}', 'MangaController@detailChapter')->name('detailChapter');



// GENRE
// DAFTAR GENRE
Route::get('/daftar-genre', 'MangaController@daftarGenre');
// DETAIL GENRE
Route::get('/genre/{slug_genre}', 'MangaController@detailGenre')->name('detailGenre');


//OTHER LANDING PAGE
//DAFTAR OTHER HOT
Route::get('/other/hot', 'OtherController@detaiOtherHot');
//DAFTAR OTHER REKOMENDASI
Route::get('/other/rekomendasi', 'OtherController@detaiOtherRekomendasi');
//DAFTAR OTHER BERWARNA
Route::get('/other/berwarna', 'OtherController@detaiOtherBerwarna');


// CATEGORY
// MANGA CATEGORY
Route::get('/category/manga', 'CategoryController@detailCategoryManga')->name('categoryManga');
// MANHUA CATEGORY
Route::get('/category/manhua', 'CategoryController@detailCategoryManhua')->name('categoryManhua');
// MANHWA CATEGORY
Route::get('/category/manhwa', 'CategoryController@detailCategoryManhwa')->name('categoryManhwa');

// SEARCHING
Route::get('/searching', 'HomeController@searching');

// SETTING
Route::get('privacy-policy', 'SettingController@privacyPolicy')->name('settingPrivacy');
Route::get('contact', 'SettingController@contactUs')->name('settingContact');
Route::get('disclaimer', 'SettingController@disclaimer')->name('settingDisclaimer');
Route::get('dmca', 'SettingController@dmca')->name('settingDmca');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'Admin\AdminController@index')->name('admin');