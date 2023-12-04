<?php

// login
use App\Http\Controllers\AutentikasiController;

// tampilan
use App\Http\Controllers\dashboard;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\JenisPegawaiController;
use App\Http\Controllers\KelaminController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\StatusPegawaiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HalamanUtama;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('index'));
});

// Route::get('dashboard/coba',[dashboard::class, 'coba']);
Route::get('index',[HalamanUtama::class, 'index'])->name('index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('dashboard',[dashboard::class, 'index']);
    Route::get('create', [dashboard::class, 'create'])->name('create');
    Route::post('dashboard/store', [dashboard::class, 'store'])->name('dashboard.store');
    Route::get('dashboard/{id}/edit', [dashboard::class, 'edit'])->name('dashboard.edit');
    Route::put('dashboard/{id}', [dashboard::class, 'update'])->name('dashboard.update');
    Route::delete('dashboard/{id}', [dashboard::class, 'destroy'])->name('dashboard.delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('agama/index',[AgamaController::class, 'index'])->name('agama.index');
    Route::get('agama/create', [AgamaController::class,'create'])->name('agama.create');
    Route::post('agama/store', [AgamaController::class, 'store'])->name('agama.store');
    Route::get('agama/{id}/edit', [AgamaController::class, 'edit'])->name('agama.edit');
    Route::put('agama/{id}', [AgamaController::class, 'update'])->name('agama.update');
    Route::delete('agama/{id}', [AgamaController::class, 'destroy'])->name('agama.delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('jeniskelamin/index',[KelaminController::class, 'index'])->name('jenisKelamin.index');
    Route::get('jeniskelamin/create', [KelaminController::class,'create'])->name('jenisKelamin.create');
    Route::post('jeniskelamin/store', [KelaminController::class, 'store'])->name('jenisKelamin.store');
    Route::get('jeniskelamin/{id}/edit', [KelaminController::class, 'edit'])->name('jenisKelamin.edit');
    Route::put('jeniskelamin/{id}', [KelaminController::class, 'update'])->name('jenisKelamin.update');
    Route::delete('jeniskelamin/{id}', [KelaminController::class, 'destroy'])->name('jenisKelamin.delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('pendidikan/index',[PendidikanController::class, 'index'])->name('pendidikan.index');
    Route::get('pendidikan/create', [PendidikanController::class,'create'])->name('pendidikan.create');
    Route::post('pendidikan/store', [PendidikanController::class, 'store'])->name('pendidikan.store');
    Route::get('pendidikan/{id}/edit', [PendidikanController::class, 'edit'])->name('pendidikan.edit');
    Route::put('pendidikan/{id}', [PendidikanController::class, 'update'])->name('pendidikan.update');
    Route::delete('pendidikan/{id}', [PendidikanController::class, 'destroy'])->name('pendidikan.delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('jenisPegawai/index',[JenisPegawaiController::class, 'index'])->name('jenisPegawai.index');
    Route::get('jenisPegawai/create', [JenisPegawaiController::class,'create'])->name('jenisPegawai.create');
    Route::post('jenisPegawai/store', [JenisPegawaiController::class, 'store'])->name('jenisPegawai.store');
    Route::get('jenisPegawai/{id}/edit', [JenisPegawaiController::class, 'edit'])->name('jenisPegawai.edit');
    Route::put('jenisPegawai/{id}', [JenisPegawaiController::class, 'update'])->name('jenisPegawai.update');
    Route::delete('jenisPegawai/{id}', [JenisPegawaiController::class, 'destroy'])->name('jenisPegawai.delete');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('statusPegawai/index',[StatusPegawaiController::class, 'index'])->name('statusPegawai.index');
    Route::get('statusPegawai/create', [StatusPegawaiController::class,'create'])->name('statusPegawai.create');
    Route::post('statusPegawai/store', [StatusPegawaiController::class, 'store'])->name('statusPegawai.store');
    Route::get('statusPegawai/{id}/edit', [StatusPegawaiController::class, 'edit'])->name('statusPegawai.edit');
    Route::put('statusPegawai/{id}', [StatusPegawaiController::class, 'update'])->name('statusPegawai.update');
    Route::delete('statusPegawai/{id}', [StatusPegawaiController::class, 'destroy'])->name('statusPegawai.delete');
});


// login
Route::get('/register',[AutentikasiController::class, 'registerForm'])->name('register.input');
Route::post('/register/register',[AutentikasiController::class, 'register'])->name('register');
Route::get('/login', [AutentikasiController::class, 'loginForm'])->name('login.input');
Route::post('/login/login',[AutentikasiController::class, 'login'])->name('login');

//logout
Route::get('/logout', [AutentikasiController::class, 'logout'])->name('logout');

