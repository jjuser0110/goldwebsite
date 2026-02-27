<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::prefix('/rate')->as('rate.')->middleware(['auth'])->group(function() {
    Route::get('/index', 'RateController@index')->name('index');
    Route::get('/create', 'RateController@create')->name('create');
    Route::post('/store', 'RateController@store')->name('store');
    Route::get('/edit/{rate}', 'RateController@edit')->name('edit');
    Route::post('/update/{rate}', 'RateController@update')->name('update');
    Route::get('/destroy/{rate}', 'RateController@destroy')->name('destroy');
});
