<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Nilai;
use App\Models\Murid;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;


class DataNilaiController extends Controller
{

   public function exportTxt(Request $request)
{
    // Ambil data sesuai filter
    $query = Nilai::with(['murid', 'matapelajaran']);

    if ($request->filled('semester')) {
        $query->where('semester', $request->semester);
    }

    if ($request->filled('mapel')) {
        $query->where('id_mapel', $request->mapel);
    }

    if ($request->filled('search')) {
        $query->whereHas('murid', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%');
        });
    }

    $data = $query->get();

    // Buat isi file txt
    $content = "Laporan Data Nilai Siswa\n";
    $content .= "========================\n\n";

    foreach ($data as $nilai) {
        $content .= "Nama         : " . $nilai->murid->nama . "\n";
        $content .= "Mata Pelajaran: " . $nilai->matapelajaran->nama_mapel . "\n";
        $content .= "Nilai        : " . $nilai->nilai . "\n";
        $content .= "Predikat     : " . $this->getPredikat($nilai->nilai) . "\n";
        $content .= "Semester     : " . $nilai->semester . "\n";
        $content .= "--------------------------\n";
    }

    $fileName = 'laporan_nilai_' . now()->format('YmdHis') . '.txt';
    $path = storage_path('app/public/' . $fileName);

    file_put_contents($path, $content);

    return response()->download($path)->deleteFileAfterSend(true);
}

    private function getPredikat($nilai)
    {
        if ($nilai >= 90) return 'A';
        if ($nilai >= 80) return 'B';
        if ($nilai >= 70) return 'C';
        if ($nilai >= 60) return 'D';
        return 'E';
    }

    public function index(Request $request)
    {
        $semesters = [1, 2];

        // Query dengan relasi
        $query = Nilai::with(['murid', 'matapelajaran']);

        if ($request->filled('semester')) {
            $query->where('semester', $request->semester);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('murid', function ($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('mapel')) {
            $query->where('id_mapel', $request->mapel);
        }

        // Ambil data sementara (belum paginate) untuk filter predikat
        $data = $query->get();

        // Filter berdasarkan predikat jika diminta
        if ($request->filled('predikat')) {
            $data = $data->filter(function ($item) use ($request) {
                return $this->getPredikat($item->nilai) == $request->predikat;
            })->values(); // values() untuk reset index
        }

        // Tambahkan predikat ke setiap item
        foreach ($data as $item) {
            $item->predikat = $this->getPredikat($item->nilai);
        }

        // Manual pagination
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $data->slice(($currentPage - 1) * $perPage, $perPage);
        $nilai = new LengthAwarePaginator($currentItems, $data->count(), $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        $rata_rata_nilai = number_format($data->avg('nilai') ?? 0, 2);
        $mapel = MataPelajaran::all();

        return view('admin.datanilai.index', compact('nilai', 'rata_rata_nilai', 'mapel', 'semesters'));
    }



    public function create()
    {
        $murid = Murid::all();
        $mapel = MataPelajaran::all();
        $guru = Guru::all(); // Tambahkan baris ini
        return view('admin.datanilai.create', compact('murid', 'mapel', 'guru')); // Sertakan 'guru' juga
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
    $guru = Guru::all(); 

    return view('admin.datanilai.edit', compact('nilai', 'murid', 'mapel', 'guru'));
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

    public function exportPdf(Request $request)
{
    // Ambil data nilai sesuai filter yang sama dengan index
    $query = Nilai::with(['murid', 'matapelajaran']);

    if ($request->filled('semester')) {
        $query->where('semester', $request->semester);
    }

    if ($request->filled('search')) {
        $search = $request->search;
        $query->whereHas('murid', function ($q) use ($search) {
            $q->where('nama', 'like', '%' . $search . '%');
        });
    }

    if ($request->filled('mapel')) {
        $query->where('id_mapel', $request->mapel);
    }

    $data = $query->get();

    // Tambahkan predikat
    foreach ($data as $item) {
        $item->predikat = $this->getPredikat($item->nilai);
    }

    $pdf = PDF::loadView('admin.datanilai.exportPDF', compact('data'));

    // Download file pdf
    return $pdf->download('data_nilai.pdf');
}
}
