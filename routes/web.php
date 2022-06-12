<?php

use App\Models\Pegawai;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;

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
    $jumlahpegawai = Pegawai::count();
    $jumlahpegawaiL = Pegawai::where('jk','Laki-laki')->count();
    $jumlahpegawaiP = Pegawai::where('jk','Perempuan')->count();

    return view('dashboard', compact('jumlahpegawai','jumlahpegawaiL', 'jumlahpegawaiP'));
})->middleware('auth');
Route::get('pegawai',[PegawaiController::class, 'index'])->name('pegawai')->middleware('auth');
Route::get('create',[PegawaiController::class, 'create'])->name('create');
Route::post('save',[PegawaiController::class, 'store'])->name('simpan');
Route::put('/update-pegawai/{id}', [PegawaiController::class, 'update'])->name('update');
Route::get('edit-Pegawai/{id}', [PegawaiController::class, 'edit'])->name('edit');
Route::get('/delete/{id}',[PegawaiController::class, 'delete'])->name('delete');
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');
