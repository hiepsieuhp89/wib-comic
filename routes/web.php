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

Route::get('/','wibcomi\IndexController@index')->name('wibcomi.home');
Route::get('/manga/{slug}','wibcomi\IndexController@detail_manga')->name('wibcomi.manga.manga');
Route::get('/reading-mode/{slug}/{chap}/{code}','wibcomi\IndexController@read_manga')->name('wibcomi.manga.read');
Route::get('/tim-truyen/','wibcomi\IndexController@category')->name('wibcomi.manga.category');
