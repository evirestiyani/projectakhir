<?php

namespace App\Http\Controllers\Murid;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\MataPelajaran;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Response;


class DashMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
public function index()
{
    $murid = auth()->guard('murid')->user();

  
    $nilai = Nilai::with('mataPelajaran')
        ->where('id_murid', $murid->id)
        ->get();

    return view('murid.dashboardmurid', compact('nilai'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
