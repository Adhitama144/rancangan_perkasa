<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\Biaya_PengirimanController;
use App\Http\Controllers\Management_AkunController;
use App\Http\Controllers\ProfileController;

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
Route::middleware('NonSesi')->group(
    function () {
        Route::get('/register', function () {
            return view('register');
        });

        Route::post('/register', [RegisterController::class, 'register']);

        Route::get('/login', function () {
            return view('login');
        });

        Route::post('/login', [LoginController::class, 'login']);
    }
);

Route::middleware('Sesi')->group(
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
    }
);

Route::middleware('Admin')->group(
    function () {
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/kategori-tambah' , [KategoriController::class, 'tambah']);
        Route::post('/kategori-edit' , [KategoriController::class, 'edit']);
        Route::post('/kategori-hapus' , [KategoriController::class, 'hapus']);

        Route::get('/barang', [BarangController::class, 'index']);
        Route::post('/barang-tambah' , [BarangController::class, 'tambah']);
        Route::post('/barang-edit' , [BarangController::class, 'edit']);
        Route::post('/barang-hapus' , [BarangController::class, 'hapus']);

        Route::get('/biaya-pengiriman', [Biaya_PengirimanController::class, 'index']);
        Route::post('/biaya-pengiriman-tambah' , [Biaya_PengirimanController::class, 'tambah']);
        Route::post('/biaya-pengiriman-edit' , [Biaya_PengirimanController::class, 'edit']);
        Route::post('/biaya-pengiriman-hapus' , [Biaya_PengirimanController::class, 'hapus']);

        Route::get('/management-akun', [Management_AkunController::class, 'index']);
        Route::post('/management-akun-edit', [Management_AkunController::class, 'edit']);
        Route::post('/management-akun-ganti-sandi', [Management_AkunController::class, 'GantiSandi']);

        Route::get('/profile', [ProfileController::class, 'index']);
        Route::post('/profile-edit', [ProfileController::class, 'edit']);
        Route::post('/profile-sandi', [ProfileController::class, 'sandiLama']);

    }
);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');