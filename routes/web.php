<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\barangController;
use App\Http\Controllers\barangInController;
use App\Http\Controllers\customerController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\sesiController;
use App\Http\Controllers\supplyerController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
 
// Route::get('/', [homeController::class, 'index']);

Route::middleware(['guest'])->group(function() {
    Route::get('/', [sesiController::class, 'index'])->name('login');
    Route::post('/', [sesiController::class, 'login']);
});

Route::middleware(['auth'])->group(function(){
    // Route::get('/admin',[adminController::class,'index']);
    Route::get('/admin', [adminController::class, 'manajer'])->middleware('userakses:manajer');
    Route::get('/admin/staff', [adminController::class, 'staff'])->middleware('userakses:staff');
    Route::get('/logout',[sesiController::class,'logout']);
});

//crud data user
Route::get('/user', [userController::class, 'index']);
Route::post('/user/store', [userController::class, 'store']);
Route::post('/user/update/{id}', [userController::class, 'update']);
Route::get('/user/destroy/{id}', [userController::class, 'destroy']);

//crud data kategory
Route::get('/kategori', [barangController::class, 'category']);
Route::post('/kategori/store', [barangController::class, 'store_category']);
Route::post('/kategori/update/{id}', [barangController::class, 'update_category']);
Route::get('/kategori/destroy/{id}', [barangController::class, 'destroy_category']);

//crud data kategory
Route::get('/barang', [barangController::class, 'barang']);
Route::post('/barang/store', [barangController::class, 'store_barang']);
Route::post('/barang/update/{id}', [barangController::class, 'update_barang']);
Route::get('/barang/destroy/{id}', [barangController::class, 'destroy_barang']);

//crud data supplyer
Route::get('/supplyer', [supplyerController::class, 'index']);
Route::post('/supplyer/store', [supplyerController::class, 'store']);
Route::post('/supplyer/update/{id}', [supplyerController::class, 'update']);
Route::get('/supplyer/destroy/{id}', [supplyerController::class, 'destroy']);

//crud data supplyer
Route::get('/customer', [customerController::class, 'index']);
Route::post('/customer/store', [customerController::class, 'store']);
Route::post('/customer/update/{id}', [customerController::class, 'update']);
Route::get('/customer/destroy/{id}', [customerController::class, 'destroy']);

//crud transaksi
Route::get('/barangin', [barangInController::class, 'index']);