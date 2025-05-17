<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;


class DataGuruController extends Controller
{
    public function index(Request $request)
    {
        $query = Guru::with('mataPelajaran');

        // Pencarian berdasarkan nama atau nip
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan mata pelajaran
        if ($request->has('subject') && $request->subject != '') {
    $query->whereHas('mataPelajaran', function ($q) use ($request) {
        $q->where('id', $request->subject); // filter by id mata pelajaran, bukan kode
    });
}


        $guru = $query->paginate(10)->withQueryString();

        // Ambil data mapel untuk dropdown filter
        $mapel = MataPelajaran::all();

        return view('admin.dataguru.index', compact('guru', 'mapel'));
    }

    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('admin.dataguru.create', compact('mapel'));
    }

    public function show($id)
{
    $guru = Guru::with('mataPelajaran')->findOrFail($id);
    return view('admin.dataguru.show', compact('guru'));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:50|unique:guru,nip',
            'email' => 'required|email|max:255|unique:guru,email',
            'no_telp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'id_user' => 'required|integer',
            'id_mapel' => 'required|exists:mata_pelajaran,id',
        ]);

        Guru::create($validated);

        return redirect()->route('admin.dataguru.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapel = MataPelajaran::all();
        return view('admin.dataguru.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => "required|string|max:50|unique:guru,nip,{$id}",
            'email' => "required|email|max:255|unique:guru,email,{$id}",
            'no_telp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'id_user' => 'required|integer',
            'id_mapel' => 'required|exists:mata_pelajaran,id',
        ]);

        $guru->update($validated);

        return redirect()->route('admin.dataguru.index')->with('success', 'Guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.dataguru.index')->with('success', 'Data guru berhasil dihapus.');
    }

    public function exportPDF()
{
    $guru = Guru::with('mataPelajaran')->get(); // ambil semua data guru

    $pdf = Pdf::loadView('admin.dataguru.exportpdf', compact('guru'));
    return $pdf->download('data-guru.pdf');
}

public function exportWord()
{
    $guru = Guru::with('mataPelajaran')->get();

    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    // Judul
    $section->addText('Laporan Data Guru', ['bold' => true, 'size' => 16]);
    $section->addText('SMK Contoh Negeri 1', ['size' => 12]);
    $section->addTextBreak(1);

    // Buat tabel
    $table = $section->addTable([
        'borderSize' => 6,
        'borderColor' => '999999',
        'cellMargin' => 50,
    ]);

    // Header tabel
    $table->addRow();
    $table->addCell(2000)->addText('Nama');
    $table->addCell(1500)->addText('NIP');
    $table->addCell(2500)->addText('Email');
    $table->addCell(2000)->addText('No. Telepon');
    $table->addCell(1500)->addText('Gender');
    $table->addCell(2500)->addText('Mata Pelajaran');

    // Isi tabel
    foreach ($guru as $g) {
        $table->addRow();
        $table->addCell(2000)->addText($g->nama);
        $table->addCell(1500)->addText($g->nip);
        $table->addCell(2500)->addText($g->email);
        $table->addCell(2000)->addText($g->no_telp);
        $table->addCell(1500)->addText($g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan');
        $table->addCell(2500)->addText($g->mataPelajaran->mata_pelajaran ?? '-');
    }

    // Simpan ke file sementara
    $tempFile = tempnam(sys_get_temp_dir(), 'word');
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($tempFile);

    // Kirim response download
    return response()->download($tempFile, 'Laporan-Data-Guru.docx')->deleteFileAfterSend(true);
}

public function exportExcel()
{
    return Excel::download(new GuruExport, 'data-guru.xlsx');
}

}

