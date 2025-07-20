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

// 🔓 Halaman Publik
Route::get('/', function () {
    return view('welcome');
});

// 🔐 Route Auth (login, register, dll)
require __DIR__.'/auth.php';

// ✅ Semua route ini hanya untuk user yang sudah login dan verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | 👑 ADMIN ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

        // Produk CRUD
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
        Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
        Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
        Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

        // Analisis Penjualan
        Route::get('/analisis', [AnalisisController::class, 'index'])->name('analisis.index');

        // Kasir (admin juga bisa mengakses menu kasir)
        Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
        Route::post('/kasir/checkout', [KasirController::class, 'checkout'])->name('kasir.checkout');
    });

    /*
    |--------------------------------------------------------------------------
    | 🙋 USER ROUTES
    |--------------------------------------------------------------------------
    */
    Route::middleware(['role:user'])->group(function () {

        Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');

        // Belanja
        Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');

        // Keranjang
        Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
        Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
        Route::delete('/keranjang/clear', [KeranjangController::class, 'clear'])->name('keranjang.clear');

        // Checkout
       Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/nota', [CheckoutController::class, 'receipt'])->name('checkout.receipt');
Route::get('/checkout/nota/download', [CheckoutController::class, 'download'])->name('checkout.download');


    });

});
