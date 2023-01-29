<?php

use App\Http\Controllers\AtkController;
use App\Http\Controllers\MajelisController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WakalahController;
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
    return view('welcome',['title'=>'Manonjaya.app']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('atk',AtkController::class);
    Route::post('atk/updated_item',[AtkController::class,'update_item'])->name('update.item');
    Route::get('barangmasuk',[AtkController::class,'indexBarangMasuk'])->name('barangmasuk');
    Route::get('barangmasuk/create',[AtkController::class,'createBarangMasuk'])->name('create.barangmasuk');
    Route::post('barangmasuk/store',[AtkController::class,'storeBarangMasuk'])->name('barangmasuk.store');
    Route::delete('barangmasuk/{barangMasuk}',[AtkController::class,'destroyBarangMasuk'])->name('barangmasuk.destroy');

    Route::get('barangkeluar',[AtkController::class,'indexBarangKeluar'])->name('barangkeluar');
    Route::get('barangkeluar/create',[AtkController::class,'createBarangKeluar'])->name('barangkeluar.create');
    Route::post('barangkeluar/store',[AtkController::class,'storeBarangKeluar'])->name('barangkeluar.store');
    Route::delete('barangkeluar/{barangKeluar}',[AtkController::class,'destroyBarangKeluar'])->name('barangkeluar.destroy');

    Route::get('baranghilang',[AtkController::class,'indexBarangHilang'])->name('baranghilang');
    Route::get('baranghilang/create',[AtkController::class,'createBarangHilang'])->name('baranghilang.create');
    Route::post('baranghilang/store',[AtkController::class,'storeBarangHilang'])->name('baranghilang.store');
    Route::delete('baranghilang/{barangHilang}',[AtkController::class,'destroyBarangHilang'])->name('baranghilang.destroy');

    Route::resource('wakalah',WakalahController::class);
    Route::resource('petugas',PetugasController::class);
    Route::resource('majelis',MajelisController::class);
    Route::PUT('petugas/status/{status}/id/{id}',[PetugasController::class,'update_status'])->name('petugas.update_status');
});

require __DIR__.'/auth.php';
