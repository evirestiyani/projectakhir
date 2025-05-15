<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboardadmin'); // atau return apa pun yang kamu perlukan
    }
}
