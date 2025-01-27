<?php

use Illuminate\Support\Facades\Route;


$controller_path = 'App\Http\Controllers';


Route::get('/', $controller_path .'\HomePageController@index')->name('HomePage');
Route::get('/santri-random', $controller_path .'\HomePageController@getSantriRandom')->name('santriRandom');
Route::get('/pegawai-random', $controller_path .'\HomePageController@getPegawaiRandom')->name('pegawaiRandom');
Route::get('/about', $controller_path .'\HomePageController@About')->name('aboutPage');
Route::get('/visi-misi', $controller_path .'\HomePageController@visimisi')->name('visimisi');
Route::get('/sekapur-sirih', $controller_path .'\HomePageController@sekapursirih')->name('sekapursirih');

Route::get('/santri', $controller_path .'\SantriController@index')->name('santri');
Route::post('/get_santri', $controller_path .'\SantriController@get_santri')->name('get_santri');

Route::get('/alumni', $controller_path .'\AlumniController@index')->name('alumni');
Route::post('/get_alumni', $controller_path .'\AlumniController@get_alumni')->name('get_alumni');

Route::get('/galeri', $controller_path .'\GaleriController@index')->name('galeri');

Route::get('/berita', $controller_path .'\BeritaController@index')->name('berita');
Route::get('/berita/{id_berita}', $controller_path .'\BeritaController@detail')->name('berita.detail');

Route::get('/kelas', $controller_path .'\KelasController@index')->name('kelas');
Route::get('/kelas/{id}', $controller_path .'\KelasController@detail')->name('kelas.detail');

Route::get('/kamar', $controller_path .'\KamarController@index')->name('kamar');
Route::get('/kamar/{id}', $controller_path .'\KamarController@show')->name('kamar.detail');