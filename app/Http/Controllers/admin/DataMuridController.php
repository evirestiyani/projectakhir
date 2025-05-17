<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Murid;
use Barryvdh\DomPDF\Facade\Pdf;



class DataMuridController extends Controller
{
   public function index(Request $request)
{
    $query = Murid::query();

    // Filter search by 'nama'
    if ($request->filled('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    // Filter by jenis kelamin
    if ($request->filled('jenis_kelamin')) {
        $query->where('jenis_kelamin', $request->jenis_kelamin);
    }

    // Filter by kelas
    if ($request->filled('kelas')) {
        $query->where('kelas', $request->kelas);
    }

    $murid = $query->paginate(10)->withQueryString();

    $kelasList = Murid::select('kelas')->distinct()->orderBy('kelas')->pluck('kelas');

    $jenkelList = Murid::select('jenis_kelamin')->distinct()->pluck('jenis_kelamin');

    return view('admin.datamurid.index', compact('murid', 'kelasList', 'jenkelList'));
}


public function create()
{
    $kelasList = ['XI RPL 1', 'XI RPL 2', 'XI RPL 3'];
    return view('admin.datamurid.create', compact('kelasList'));
}

public function show($id)
{
    $murid = Murid::findOrFail($id);
    return view('admin.datamurid.show', compact('murid'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|unique:murid,nis',
            'kelas' => 'required|string|max:20',
            'no_telp' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
            'id_user' => 'required|exists:users,id',
        ]);

        Murid::create($request->all());

        return redirect()->route('admin.datamurid.index')->with('success', 'Data murid berhasil disimpan.');
    }

   public function edit($id)
{
    $murid = Murid::findOrFail($id);
    $kelasList = ['XI RPL 1', 'XI RPL 2', 'XI RPL 3'];
    return view('admin.datamurid.edit', compact('murid', 'kelasList'));
}


    public function update(Request $request, $id)
    {
        $murid = Murid::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|unique:murid,nis,' . $murid->id,
            'kelas' => 'required|string|max:20',
            'no_telp' => 'nullable|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir' => 'required|date',
            'id_user' => 'required|exists:users,id',
        ]);

        $murid->update($request->all());

        return redirect()->route('admin.datamurid.index')->with('success', 'Data murid berhasil diupdate.');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();

        return redirect()->route('admin.datamurid.index')->with('success', 'Data murid berhasil dihapus.');
    }

 
public function exportPDF()
{
    $murid = Murid::all(); // atau bisa juga pakai with() jika relasi

    $pdf = Pdf::loadView('admin.datamurid.exportpdf', compact('murid'));
    return $pdf->download('data-murid.pdf');
}
}
