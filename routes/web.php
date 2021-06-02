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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login','AuthController@login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::get('/cetak-laporan','LaporanController@laporan')->name('laporan.cetak');

Route::get('/info-penerima-beasiswa','BeasiswaController@index')->name('beasiswa');
Route::get('/info-penerima-beasiswa-list','BeasiswaController@dataBeasiswa')->name('data.beasiswa');



Auth::routes();

Route::group(['roles'=>'Admin'],function(){



});

// Route Admin //
Route::group(['middleware' => ['web', 'auth', 'role']],function(){
    Route::group(['role'=>'Admin'],function(){


        Route::get('/profile', 'ProfileController@index')->name('profile');

        Route::get('/profile/edit/{id}', 'ProfileController@profile')->name('profile.edit');
        Route::post('/profile/update/{id}', 'ProfileController@update')->name('profile.update');


        Route::get('/ganti-password', 'GantiPasswordController@password')->name('password');
        Route::post('/update-password/{id}', 'GantiPasswordController@update')->name('password.update');

        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/perhitungan','PerhitunganController@index')->name('perhitungan');
        Route::get('/tabel-ranking','PerhitunganController@ranking')->name('ranking');
        Route::get('/tabel-normalisasi','PerhitunganController@normalisasi')->name('normalisasi');
        //Route module for kriteria
        Route::prefix('/kriteria')->group(function ()
        {
            Route::get('/', 'KriteriaController@index')->name('kriteria');
            Route::get('/tambah', 'KriteriaController@create')->name('kriteria.tambah');
            Route::post('/tambah', 'KriteriaController@store')->name('kriteria.simpan');
            Route::get('/edit/{id}', 'KriteriaController@edit')->name('kriteria.edit');
            Route::post('/edit/{id}', 'KriteriaController@update')->name('kriteria.update');
            Route::post('/hapus/{id}', 'KriteriaController@destroy')->name('kriteria.hapus');
        });

        //Route module for crip
        Route::prefix('/crip')->group(function ()
        {
            Route::get('/', 'CripController@index')->name('crip');
            Route::get('/tambah', 'CripController@create')->name('crip.tambah');
            Route::post('/tambah', 'CripController@store')->name('crip.simpan');
            Route::get('/edit/{id}', 'CripController@edit')->name('crip.edit');
            Route::post('/edit/{id}', 'CripController@update')->name('crip.update');
            Route::post('/hapus/{id}', 'CripController@destroy')->name('crip.hapus');
        });

        //Route module for alternatif
        Route::prefix('/alternatif')->group(function ()
        {
            Route::get('/', 'AlternatifController@index')->name('alternatif');
            Route::get('/tambah', 'AlternatifController@create')->name('alternatif.tambah');
            Route::post('/tambah', 'AlternatifController@store')->name('alternatif.simpan');
            //Route::get('/{id}', 'AlternatifController@show')->name('alternatif.nilai.tambah');
            Route::get('/edit/{id}', 'AlternatifController@edit')->name('alternatif.edit');
            Route::post('/edit/{id}', 'AlternatifController@update')->name('alternatif.update');
            Route::post('/hapus/{id}', 'AlternatifController@destroy')->name('alternatif.hapus');
        });

        //Route module for nilai
        Route::prefix('/nilai')->group(function ()
        {
            Route::get('/', 'NilaiController@index')->name('nilai');
            Route::get('/{id}', 'NilaiController@create')->name('nilai.tambah');
            Route::post('/{id}', 'NilaiController@store')->name('nilai.simpan');
            Route::get('/edit/{id}', 'NilaiController@edit')->name('nilai.edit');
            Route::post('/edit/{id}', 'NilaiController@update')->name('nilai.update');
            Route::post('/hapus/{id}', 'NilaiController@destroy')->name('nilai.hapus');
        });

        Route::get('/daftar/penerima/beasiswa','BeasiswaController@penerima')->name('penerima.beasiswa');
        Route::get('/tambah/penerima/beasiswa','BeasiswaController@tambahBeasiswa')->name('tambah.penerima.beasiswa');
        Route::get('/edit/penerima/beasiswa/{id}','BeasiswaController@edit')->name('edit.penerima.beasiswa');
        Route::post('/simpan/penerima/beasiswa/{id}','BeasiswaController@simpan')->name('simpan.penerima.beasiswa');
        Route::post('/update/penerima/beasiswa/{id}','BeasiswaController@update')->name('update.penerima.beasiswa');
        Route::post('/hapus/penerima/beasiswa/{id}','BeasiswaController@hapus')->name('hapus.penerima.beasiswa');

        Route::get('/data/penerima-beasiswa/detail/{id}','BeasiswaController@detail');
    });
});



// Route Kepsek //
Route::group(['middleware' => ['web', 'auth', 'kepsek']],function(){
    Route::group(['kepsek'=>'Kepsek'],function(){

        Route::get('/kepsek', 'KepsekController@index')->name('kepsek');
        Route::get('/kepsek/hasil-analisa', 'KepsekController@analisa')->name('kepsek.analisa');
        Route::get('/kepsek/data-ranking', 'KepsekController@ranking')->name('kepsek.ranking');
        Route::get('/kepsek/data-normalisasi', 'KepsekController@normalisasi')->name('kepsek.normalisasi');

        Route::get('/kepsek/data-user', 'KepsekController@user')->name('kepsek.user');
        Route::get('/kepsek/tambah-data-user', 'KepsekController@tambah')->name('kepsek.tambah');
        Route::post('/kepsek/simpan-data-user', 'KepsekController@simpan')->name('kepsek.simpan');
        Route::get('/kepsek/edit-data-user/{id}', 'KepsekController@edit')->name('kepsek.edit');
        Route::post('/kepsek/update-data-user/{id}', 'KepsekController@update')->name('kepsek.update');
        Route::post('/kepsek/hapus-data-user/{id}', 'KepsekController@hapus')->name('kepsek.hapus');

        Route::get('/ganti-password/kepsek', 'GantiPasswordController@passwordKepsek')->name('password.kepsek');
        Route::post('/update-password/kepsek/{id}', 'GantiPasswordController@updateKepsek')->name('password.update.kepsek');
        Route::get('/profile-kepsek', 'ProfileController@kepsek')->name('profile.kepsek');
        Route::post('/profile/kepsek/update/{id}', 'ProfileController@kepsekUpdate')->name('profile.kepsek.update');


        Route::get('/tambah/penerima-beasiswa', 'BeasiswaController@tambah')->name('beasiswa.tambah');

        Route::prefix('/kepsek')->group(function ()
        {
            //Route::get('/', 'KepsekController@index')->name('kepsek');

            Route::post('/{id}', 'KepsekController@simpan')->name('kepsek.simpan');

        });

    });
});






