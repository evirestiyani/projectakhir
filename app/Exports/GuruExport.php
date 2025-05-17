<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Sesuaikan kolom yang mau diexport
        return Guru::with('mataPelajaran')
            ->get()
            ->map(function($g){
                return [
                    'Nama' => $g->nama,
                    'NIP' => $g->nip,
                    'Email' => $g->email,
                    'No Telepon' => $g->no_telp,
                    'Gender' => $g->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
                    'Mata Pelajaran' => $g->mataPelajaran->mata_pelajaran ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return ['Nama', 'NIP', 'Email', 'No Telepon', 'Gender', 'Mata Pelajaran'];
    }
}
