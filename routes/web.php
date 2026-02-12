<?php

use Illuminate\Support\Facades\Route;

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
