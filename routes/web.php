<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/change_password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change_password');
Route::post('/update_additional_value', [App\Http\Controllers\HomeController::class, 'update_additional_value'])->name('update_additional_value');// web.php
Route::get('/getPrices', [App\Http\Controllers\WelcomeController::class, 'getPrices'])->name('getPrices');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/test2', [App\Http\Controllers\HomeController::class, 'test2'])->name('test2');
Route::get('/gold', [RateController::class, 'goldIndex'])->name('gold.index');

Route::get('/gold/create', [RateController::class, 'goldCreate'])->name('gold.create');
Route::post('/gold/store', [RateController::class, 'goldStore'])->name('gold.store');

Route::get('/gold/{id}/edit', [RateController::class, 'goldEdit'])->name('gold.edit');
Route::post('/gold/{id}/update', [RateController::class, 'goldUpdate'])->name('gold.update');
Route::post('/setting_update', [App\Http\Controllers\HomeController::class, 'setting_update'])->name('setting_update');