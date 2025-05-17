<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;

class DataMataPelajaranController extends Controller
{
    public function export()
    {
        $mapel = MataPelajaran::all();
        $pdf = Pdf::loadView('admin.datamatapelajaran.pdf', compact('mapel'));
        return $pdf->download('data-mata-pelajaran.pdf');
    }

  public function index(Request $request)
{
    $query = MataPelajaran::query();

    // Filter search keyword (kode dan mata pelajaran)
    if ($request->has('search') && !empty($request->search)) {
        $query->where(function($q) use ($request) {
            $q->where('kode', 'like', '%' . $request->search . '%')
              ->orWhere('mata_pelajaran', 'like', '%' . $request->search . '%');
        });
    }

    // Filter berdasarkan kode lewat dropdown
    if ($request->has('filter_kode') && !empty($request->filter_kode)) {
        $query->where('kode', $request->filter_kode);
    }

    $mapel = $query->paginate(10);

    // Ambil daftar kode unik untuk dropdown filter
    $kodeList = MataPelajaran::select('kode')->distinct()->orderBy('kode')->pluck('kode');

    return view('admin.datamatapelajaran.index', compact('mapel', 'kodeList'));
}


    public function create()
    {
        return view('admin.datamatapelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_pelajaran,kode|max:10',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        MataPelajaran::create([
            'kode' => $request->kode,
            'mata_pelajaran' => $request->mata_pelajaran,
        ]);

        return redirect()->route('datamatapelajaran.index')->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        return view('admin.datamatapelajaran.show', compact('mapel'));
    }

    public function edit(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        return view('admin.datamatapelajaran.edit', compact('mapel'));
    }

    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $request->validate([
            'kode' => 'required|max:10|unique:mata_pelajaran,kode,' . $mapel->id,
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        $mapel->update([
            'kode' => $request->kode,
            'mata_pelajaran' => $request->mata_pelajaran,
        ]);

        return redirect()->route('datamatapelajaran.index')->with('success', 'Mata Pelajaran berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('datamatapelajaran.index')->with('success', 'Mata Pelajaran berhasil dihapus.');
    }
}
