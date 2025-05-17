<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Murid;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class DataNilaiController extends Controller
{
    public function index(Request $request)
    {
        // Data semester (ubah sesuai data semester yang ada)
        $semesters = [1, 2];

        // Query nilai dengan eager loading relasi murid dan mapel
        $query = Nilai::with(['murid', 'matapelajaran']);

        // Filter berdasarkan semester jika ada di request
        if ($request->has('semester') && $request->semester != '') {
            $query->where('semester', $request->semester);
        }

        // Ambil data nilai setelah filter
        $nilai = $query->get();

        // Hitung rata-rata nilai, jika kosong beri 0
        $rata_rata_nilai = $nilai->avg('nilai') ?? 0;

        // Ambil semua mata pelajaran
        $mapel = MataPelajaran::all();

        return view('admin.datanilai.index', compact('nilai', 'rata_rata_nilai', 'mapel', 'semesters'));
    }

    public function create()
    {
        $murid = Murid::all();
        $mapel = MataPelajaran::all();
        return view('admin.datanilai.create', compact('murid', 'mapel'));
    }

    public function store(Request $request)
    {
        // Perbaiki validasi 'exists' sesuai nama tabel dan kolom yang benar
        $request->validate([
            'id_murid' => 'required|exists:murid,id',
            'id_mapel' => 'required|exists:mata_pelajaran,id',
            'nilai' => 'required|numeric|min:0|max:100',
            'semester' => 'required|in:1,2', // sesuaikan semester jika perlu
        ]);

        Nilai::create([
            'id_murid' => $request->id_murid,
            'id_mapel' => $request->id_mapel,
            'nilai' => $request->nilai,
            'semester' => $request->semester, // jangan lupa simpan semester juga jika ada
        ]);

        return redirect()->route('admin.datanilai.index')->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $murid = Murid::all();
        $mapel = MataPelajaran::all();

        return view('admin.datanilai.edit', compact('nilai', 'murid', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_murid' => 'required|exists:murid,id',
            'id_mapel' => 'required|exists:mata_pelajaran,id',
            'nilai' => 'required|numeric|min:0|max:100',
            'semester' => 'required|in:1,2', // sesuaikan
        ]);

        $nilai = Nilai::findOrFail($id);

        $nilai->update([
            'id_murid' => $request->id_murid,
            'id_mapel' => $request->id_mapel,
            'nilai' => $request->nilai,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.datanilai.index')->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('admin.datanilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }
}
