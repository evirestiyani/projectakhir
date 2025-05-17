<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\DataGuruController;
use App\Http\Controllers\Admin\DataMataPelajaranController;
use App\Http\Controllers\Admin\DataUserController;
use App\Http\Controllers\Admin\DataMuridController;
use App\Http\Controllers\admin\DataNilaiController;
use App\Exports\GuruExport;
use App\Http\Controllers\Guru\DashboardGuruController;
use Maatwebsite\Excel\Facades\Excel;


// DASHBOARD
Route::get('/', [DashboardAdminController::class, 'index'])->name('admin.dashboardadmin');


// DATA GURU
Route::get('dataguru', [DataGuruController::class, 'index'])->name('admin.dataguru.index');
Route::get('/dataguru/create', [DataGuruController::class, 'create'])->name('admin.dataguru.create');
Route::post('/dataguru', [DataGuruController::class, 'store'])->name('dataguru.store');
Route::get('admin/dataguru/{id}', [DataGuruController::class, 'show'])->name('admin.dataguru.show');
Route::get('/dataguru/{id}/edit', [DataGuruController::class, 'edit'])->name('admin.dataguru.edit');
Route::put('/dataguru/{id}', [DataGuruController::class, 'update'])->name('dataguru.update');
Route::delete('/dataguru/{id}', [DataGuruController::class, 'destroy'])->name('dataguru.destroy');
Route::get('dataguru/export-pdf', [DataGuruController::class, 'exportPDF'])->name('admin.dataguru.exportPDF');
Route::get('/dataguru/export-word', [DataGuruController::class, 'exportWord'])->name('admin.dataguru.exportWord');
Route::get('/export-guru', [DataGuruController::class, 'exportExcel']);


// DATA MATA PELAJARAN
Route::get('datamatapelajaran', [DataMataPelajaranController::class, 'index'])->name('datamatapelajaran.index');
Route::get('datamatapelajaran/create', [DataMataPelajaranController::class, 'create'])->name('datamatapelajaran.create');
Route::post('datamatapelajaran', [DataMataPelajaranController::class, 'store'])->name('datamatapelajaran.store');
Route::get('datamatapelajaran/{id}/edit', [DataMataPelajaranController::class, 'edit'])->name('datamatapelajaran.edit');
Route::put('datamatapelajaran/{id}', [DataMataPelajaranController::class, 'update'])->name('datamatapelajaran.update');
Route::delete('datamatapelajaran/{id}', [DataMataPelajaranController::class, 'destroy'])->name('datamatapelajaran.destroy');
Route::get('/datamatapelajaran/export-pdf', [DataMataPelajaranController::class, 'export'])->name('datamatapelajaran.exportPDF');


//DATA USER
Route::get('datauser', [DataUserController::class, 'index'])->name('admin.datauser.index');
Route::get('datauser/create', [DataUserController::class, 'create'])->name('admin.datauser.create');
Route::post('datauser', [DataUserController::class, 'store'])->name('datauser.store');
Route::get('datauser/{id}/edit', [DataUserController::class, 'edit'])->name('admin.datauser.edit');
Route::put('datauser/{id}', [DataUserController::class, 'update'])->name('datauser.update');
Route::delete('datauser/{id}', [DataUserController::class, 'destroy'])->name('datauser.destroy');
Route::get('datauser/export-pdf', [DataUserController::class, 'exportPdf'])->name('admin.datauser.exportPDF');


//DATAMURID
Route::get('datamurid', [DataMuridController::class, 'index'])->name('admin.datamurid.index');
Route::get('datamurid/create', [DataMuridController::class, 'create'])->name('admin.datamurid.create');
Route::get('admin/datamurid/{id}', [DataMuridController::class, 'show'])->name('admin.datamurid.show');
Route::post('datamurid', [DataMuridController::class, 'store'])->name('datamurid.store');
Route::get('datamurid/{id}/edit', [DataMuridController::class, 'edit'])->name('admin.datamurid.edit');
Route::put('datamurid/{id}', [DataMuridController::class, 'update'])->name('datamurid.update');
Route::delete('datamurid/{id}', [DataMuridController::class, 'destroy'])->name('datamurid.destroy');
Route::get('datamurid/export-pdf', [DataMuridController::class, 'exportPDF'])->name('admin.datamurid.exportPDF');  // <-- Ini sudah benar


//DATANILAI
Route::get('nilai', [DataNilaiController::class, 'index'])->name('admin.datanilai.index');
Route::get('nilai/create', [DataNilaiController::class, 'create'])->name('admin.datanilai.create');
Route::post('nilai', [DataNilaiController::class, 'store'])->name('datanilai.store');
Route::get('nilai/{id}/edit', [DataNilaiController::class, 'edit'])->name('admin.datanilai.edit');
Route::put('nilai/{id}', [DataNilaiController::class, 'update'])->name('datanilai.update');
Route::delete('nilai/{id}', [DataNilaiController::class, 'destroy'])->name('datanilai.destroy');
Route::get('nilai/export-pdf', [DataNilaiController::class, 'exportPdf'])->name('admin.datanilai.exportPDF');



//DASHBOARD GURU
