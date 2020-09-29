<?php

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

Route::GET('/', function () {
    return view('welcome');
});

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::group(['middleware' => ['auth','checkRole:admin']], function () { 
    // Route Siswa
    Route::GET('/siswa','SiswaController@index');
    Route::POST('/siswa/create', 'SiswaController@create');
    Route::GET('/siswa/{id}/edit','SiswaController@edit');
    Route::POST('/siswa/{id}/update','SiswaController@update');
    Route::GET('/siswa/{id}/delete','SiswaController@delete');
    Route::GET('/siswa/{id}/profile','SiswaController@profile');
    Route::POST('/siswa/{id}/addnilai','SiswaController@addnilai');
    Route::GET('/siswa/exportExcel','SiswaController@exportExcel');
    Route::GET('/siswa/exportPdf','SiswaController@exportPdf');
    // Route Guru
    Route::GET('/guru/{id}/profile','GuruController@profile');
    
    // Kominfo
    // Route Pegawai
    // Route::GET('/kominfo/pegawai','KominfoController@index');
    
});

Route::group(['middleware' => ['auth','checkRole:admin,siswa']], function () {
    Route::GET('/dashboard','DashboardController@index');
});