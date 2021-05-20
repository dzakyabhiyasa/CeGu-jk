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
`

Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'landing'])->name('landing');
Route::get('/profile', [App\Http\Controllers\IndexController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/profile', [App\Http\Controllers\IndexController::class, 'profilePost'])->middleware('auth')->name('profile.post');
Route::post('/profile/password', [App\Http\Controllers\IndexController::class, 'profilePassword'])->middleware('auth')->name('profile.password');

Route::get('/list', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/detail/{id}', [App\Http\Controllers\IndexController::class, 'detail'])->name('detail');
Route::get('/detail/booking', [App\Http\Controllers\IndexController::class, 'booking'])->name('booking');
Route::get('/success', [App\Http\Controllers\IndexController::class, 'success'])->name('success');

Route::resource('photos', PhotoController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
