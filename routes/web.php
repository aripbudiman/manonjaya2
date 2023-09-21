<?php

use App\Http\Controllers\AtkController;
use App\Http\Controllers\MajelisController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SelisihKurangController;
use App\Http\Controllers\SelisihLebihController;
use App\Http\Controllers\TitipanController;
use App\Http\Controllers\WakalahController;
use App\Http\Controllers\Sp3Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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
    $wakalah =DB::table('wakalah')->selectRaw('sum(nominal) as nominal')->where('status','OnProses')->get();
    $titipan=DB::table('titipan')->selectRaw('sum(kredit) as nominal')->where('status','not_taken')->get();
    $titipans=DB::table('titipan')->selectRaw('sum(kredit) as nominal, petugas')->where('status','not_taken')->groupBy('petugas')->get();
    $listwkl=DB::table('wakalah')->selectRaw('sum(nominal) as nominal, petugas')->where('status','OnProses')->groupBy('petugas')->get();
    $saldoSelisihLebih=DB::table('selisih_lebih')->selectRaw('sum(kredit) as nominal')->where('status','pending')->get();
    $listSelisihLebih=DB::table('selisih_lebih')->selectRaw('sum(kredit) as nominal, petugas')->where('status','pending')->groupBy('petugas')->get();
    $saldoSelisihKurang=DB::table('selisih_kurang')->selectRaw('sum(debet) as nominal')->where('status','pending')->get();
    $listSelisihKurang=DB::table('selisih_kurang')->selectRaw('sum(debet) as nominal, petugas')->where('status','pending')->groupBy('petugas')->get();
    // return$listwkl;

    return view('welcome',['title'=>'Manonjaya.app'],compact('wakalah','titipan','titipans','listwkl','saldoSelisihLebih','listSelisihLebih','saldoSelisihKurang','listSelisihKurang'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/export_stok_pdf',[AtkController::class,'exportStokPdf'])->name('export_stok_pdf');

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
    Route::put('wakalah/status/{status}/id/{id}',[WakalahController::class,'status'])->name('wakalah.status');
    Route::put('wakalah/id/{id}/edit',[WakalahController::class,'edit_wkl'])->name('wakalah.edit_wkl');
    Route::get('cetak_pdf/{dari}/{sampai}/{status}',[WakalahController::class,'cetak_pdf'])->name('wakalah.pdf');
    Route::get('cetak_wakalah_xlsx/{dari}/{sampai}/{status}',[WakalahController::class,'cetak_xlsx'])->name('wakalah.xlsx');
    Route::get('saldo_wakalah',[WakalahController::class,'saldo_wakalah'])->name('saldo');
    Route::post('saldo_wakalah',[WakalahController::class,'saldo_wakalah'])->name('saldo');
    Route::get('list_saldo_wakalah',[WakalahController::class,'list_saldo_wakalah'])->name('list_saldo_wakalah');
    Route::post('list_saldo_wakalah',[WakalahController::class,'list_saldo_wakalah'])->name('list_saldo_wakalah');
    Route::get('list_saldo_wakalah/{dari}/{sampai}/{status}',[WakalahController::class,'list_saldo_pdf'])->name('list_saldo_pdf');
    Route::get('list_saldo_wakalah_xlsx/{dari}/{sampai}/{status}',[WakalahController::class,'list_saldo_xlsx'])->name('list_saldo_xlsx');
    
    Route::resource('petugas',PetugasController::class);
    Route::resource('majelis',MajelisController::class);
    Route::PUT('petugas/status/{status}/id/{id}',[PetugasController::class,'update_status'])->name('petugas.update_status');

    Route::get('titipan',[TitipanController::class,'index'])->name('titipan.index');
    Route::resource('titipan',TitipanController::class);


    Route::post('/import',[TitipanController::class,'import'])->name('import');
    Route::post('/import_selisih_lebih',[SelisihLebihController::class,'import'])->name('import.lebih');
    Route::post('/import_selisih_kurang',[SelisihKurangController::class,'import'])->name('import.kurang');
    Route::resource('selisih_lebih',SelisihLebihController::class);
    Route::resource('selisih_kurang',SelisihKurangController::class);

    Route::get('sp3',[Sp3Controller::class,'index'])->name('sp3');
    Route::post('sp3/id/{id}',[Sp3Controller::class,'belum_masuk'])->name('sp3.belum_masuk');
    Route::PUT('sp3/{status}',[Sp3Controller::class,'edit'])->name('sp3.edit');
    Route::get('/cetak_pdf_sp3',[Sp3Controller::class,'cetak_pdf_sp3'])->name('sp3.pdf');
});

require __DIR__.'/auth.php';
