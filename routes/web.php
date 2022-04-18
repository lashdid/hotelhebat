<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    Auth::logout();
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'logout'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/check-login', [LoginController::class, 'checkLogin'])->name('check-login');
Route::get('/form', [FormController::class, 'index'])->name('form');
Route::post('/post-form', [FormController::class, 'store'])->name('post-form');
Route::get('/room', [RoomController::class, 'index'])->name('room');
Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities');
Route::get('/recept-pdf', [PdfController::class, 'show'])->name('recept');

Route::group(['prefix' => 'admin', 'middleware' => ['check:admin']], function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/room', [RoomController::class, 'rooms']);
    Route::get('/room/edit/{id}', [RoomController::class, 'edit']);
    Route::post('/room/edit-post/{id}', [RoomController::class, 'update']);
    Route::get('/room/add', [RoomController::class, 'create']);
    Route::post('/room/add-post', [RoomController::class, 'store']);
    Route::post('/room/delete/{id}', [RoomController::class, 'destroy']);
    Route::get('/room/detail/{id}', [RoomController::class, 'show']);
    Route::get('/room-facility', [RoomController::class, 'room_facilities']);
    Route::get('/room-facility/add', [RoomController::class, 'room_facilities_create']);
    Route::post('/room-facility/add-post', [RoomController::class, 'room_facilities_store']);
    Route::get('/room-facility/edit/{id}', [RoomController::class, 'room_facilities_edit']);
    Route::post('/room-facility/edit-post/{id}', [RoomController::class, 'room_facilities_update']);
    Route::post('/room-facility/delete/{id}', [RoomController::class, 'room_facilities_destroy']);
    Route::get('/facility', [FacilityController::class, 'facilities']);
    Route::get('/facility/edit/{id}', [FacilityController::class, 'edit']);
    Route::post('/facility/edit-post/{id}', [FacilityController::class, 'update']);
    Route::get('/facility/add', [FacilityController::class, 'create']);
    Route::post('/facility/add-post', [FacilityController::class, 'store']);
    Route::post('/facility/delete/{id}', [FacilityController::class, 'destroy']);
    Route::get('/facility/detail/{id}', [FacilityController::class, 'show']);
    Route::get('/user', [AdminController::class, 'users']);
    Route::get('/user/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/user/edit-post/{id}', [AdminController::class, 'update']);
    Route::get('/user/add', [AdminController::class, 'create']);
    Route::post('/user/add-post', [AdminController::class, 'store']);
    Route::post('/user/delete/{id}', [AdminController::class, 'destroy']);
});

Route::group(['prefix' => 'receptionist', 'middleware' => ['check:resepsionis']], function(){
    Route::get('/', [GuestController::class, 'index']);
    Route::get('/search', [GuestController::class, 'search']);
    Route::get('/order/{order_by}', [GuestController::class, 'order']);
    Route::get('/detail/{id}', [GuestController::class, 'detail']);
    Route::get('/check-in/{id}', [GuestController::class, 'checkIn']);
    Route::post('/check-out/{id}', [GuestController::class, 'checkOut']);
    Route::get('/history', [GuestController::class, 'history']);
    Route::get('/history/detail/{id}', [GuestController::class, 'historyDetail']);
});