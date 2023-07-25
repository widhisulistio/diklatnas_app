<?php

use App\Http\Controllers\Mhs;
use App\Http\Controllers\Surat;
use App\Http\Controllers\Stupen;
use App\Http\Controllers\Supkl;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/',[\App\Http\Controllers\LoginController::class, 'index']);
//Route::get('login',[\App\Http\Controllers\LoginController::class,'index'])->name('login');


Route::controller(\App\Http\Controllers\LoginController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('login','index')->name('login'); //jika ada yg akses yg metod login maka diarahkan ke index
    Route::post('login/proses', 'proses');
    Route::get('logout','logout');
});

Route::group(['middleware' =>['auth']], function (){
   Route::group(['middleware' =>['cekUserLogin:1']], function (){
           Route::controller(Mhs::class)->group(function () {
           Route::get('/mhs/index', 'index');
           Route::get('/mhs/tambah', 'add');
           Route::get('/mhs/datasoft', 'datasoft'); // datasoft yang terakhir merupakan nama function dicotroller
           Route::post('/mhs/simpan', 'save');  //method post untuk menyimpan data
           Route::get('/mhs/edit/{id}', 'edit');
           Route::put('/mhs/update', 'update');
           Route::delete('/mhs/hapus/{id}', 'hapus');

           Route::get('/mhs/restore/{id}', 'restore');
           Route::delete('mhs/forceDelete/{id}', 'forceDelete');
       });
   });
    Route::group(['middleware' =>['cekUserLogin:1']], function (){
        Route::controller(Surat::class)->group(function () {
            Route::get('/surat/index', 'index');
            Route::get('/surat/stupen/{id}', 'stupen');
            Route::post('/surat/simpan', 'simpanstupen');  //method post untuk menyimpan data


        });
    });
    Route::group(['middleware' =>['cekUserLogin:1']], function (){
        Route::controller(Stupen::class)->group(function () {
            Route::get('/stupen/index', 'index');
            Route::get('/stupen/edit/{id}', 'editstupen');
            Route::get('/stupen/editdua/{id}', 'editstupendua');
            Route::get('/stupen/cetak/{id}', 'cetakstupen');
            Route::put('/stupen/update', 'update');
            Route::delete('/stupen/hapus/{id}', 'hapus');
        });
    });
    Route::group(['middleware' =>['cekUserLogin:1']], function (){
        Route::controller(Supkl::class)->group(function () {
            Route::get('/supkl/index', 'index');
            Route::get('selectmhs', 'selectmhs')->name('select.mhs');
            Route::post('/supkl/simpan', 'save');  //method post untuk menyimpan data
        });
    });
});

Route::controller(\App\Http\Controllers\Layout::class)->group(function (){
   Route::get('/layout/home', 'home');
   Route::get('/layout/index', 'index');
});


