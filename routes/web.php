<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja');
Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::post('/keranjang/add/{id}', [KeranjangController::class, 'add'])->name('keranjang.add');
Route::post('/keranjang/remove/{id}', [KeranjangController::class, 'remove'])->name('keranjang.remove');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
