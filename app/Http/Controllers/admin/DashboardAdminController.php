<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\Guru;
use App\Models\Nilai;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $jumlahSiswa = Murid::count();
        $jumlahGuru = Guru::count();
        $jumlahPenilaian = Nilai::count();

        return view('admin.dashboardadmin', compact('jumlahSiswa', 'jumlahGuru', 'jumlahPenilaian'));
    }
}
