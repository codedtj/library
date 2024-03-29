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

use Illuminate\Support\Facades\Route;

Route::prefix('files')->group(function () {
    Route::get('/download/{file}', 'FileDownloadController@download')->name('files.download');

    Route::get('/show/{file}', 'FileViewController@show')->name('files.open');
});
