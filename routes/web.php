<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Models\Murid;
use App\Models\Nilai;
use App\Models\Guru;

use Illuminate\Support\Facades\Route;


//DASHBOARD
Route::get('/', function () {
    $jumlahSiswa = Murid::count();
    $jumlahGuru = Guru::count();
    $jumlahPenilaian = Nilai::count();
    return view('admin.dashboardadmin', compact('jumlahSiswa', 'jumlahGuru', 'jumlahPenilaian'));
});

//DATA GURU
Route::get('dataguru',[DataGuruController::class, 'index'])->name('get.guru');
Route::get('/dataguru/create', [DataGuruController::class, 'create'])->name('dataguru.create');
Route::post('/dataguru', [DataGuruController::class, 'store'])->name('dataguru.store');
Route::get('/dataguru/{id}/edit', [DataGuruController::class, 'edit'])->name('dataguru.edit');
Route::put('/dataguru/{id}', [DataGuruController::class, 'update'])->name('dataguru.update');
Route::delete('/dataguru/{id}', [DataGuruController::class, 'destroy'])->name('dataguru.destroy');





