<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ImageBuildingController;
use App\Http\Controllers\ImageRoomController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\IndexController::class, 'landing'])->name('landing');
Route::get('/profile', [App\Http\Controllers\IndexController::class, 'profile'])->middleware('auth')->name('profile');
Route::post('/profile', [App\Http\Controllers\IndexController::class, 'profilePost'])->middleware('auth')->name('profile.post');
Route::post('/profile/password', [App\Http\Controllers\IndexController::class, 'profilePassword'])->middleware('auth')->name('profile.password');

Route::get('/list', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/detail/{building_id}/booking', [App\Http\Controllers\IndexController::class, 'booking'])->name('booking');
Route::get('/detail/{building_id}/booking/{room_id}', [App\Http\Controllers\IndexController::class, 'booking_form'])->name('booking.form');
Route::post('/detail/{building_id}/booking/{room_id}/process', [App\Http\Controllers\IndexController::class, 'booking_process'])->name('booking.process');
Route::get('/detail/{building_id}', [App\Http\Controllers\IndexController::class, 'detail'])->name('detail');
Route::get('/success', [App\Http\Controllers\IndexController::class, 'success'])->name('success');

Route::post('/building-to-room', [IndexController::class, 'building_to_room'])->name('building.room');
Route::get('/room/{id}', [RoomController::class, 'detail'])->name('room.show');
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

Route::resource('visitor', VisitorController::class);

Route::get('/scanner/scan', [ScannerController::class, 'scanning'])->name('scanner.scan');
Route::resource('scanner', ScannerController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/notification', [App\Http\Controllers\NotificationController::class, 'index_user'])->name('notification.user');

//dashboard
Route::get('/admin', [IndexController::class, 'admin'])->name('dashboard.index');
Route::get('/admin/booking', [BookingController::class, 'index_admin'])->name('dashboard.booking');
Route::post('/admin/booking/{id}/approve', [BookingController::class, 'approve'])->name('dashboard.approve');
Route::post('/admin/booking/{id}/decline', [BookingController::class, 'decline'])->name('dashboard.decline');
Route::get('/admin/scanning/gedung', [ScannerController::class, 'scan_gedung'])->name('dashboard.scan.gedung');
Route::get('/admin/scanning/ruangan', [ScannerController::class, 'scan_ruangan'])->name('dashboard.scan.ruangan');
Route::resource('admin/crud/gedung', BuildingController::class);
Route::resource('admin/crud/ruangan', RoomController::class);
Route::resource('admin/notification', NotificationController::class);
Route::resource('admin/image-gambar', ImageBuildingController::class);
Route::resource('admin/image-room', ImageRoomController::class);