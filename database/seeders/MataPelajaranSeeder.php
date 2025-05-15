<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataPelajaranSeeder extends Seeder

{
    public function run(): void
    {
        $data = [
            ['id' => 1, 'kode' => 'MTK', 'mata_pelajaran' => 'Matematika'],
            ['id' => 2, 'kode' => 'BIN', 'mata_pelajaran' => 'Bahasa Indonesia'],
            ['id' => 3, 'kode' => 'BIG', 'mata_pelajaran' => 'Bahasa Inggris'],
            ['id' => 4, 'kode' => 'PWEB', 'mata_pelajaran' => 'Pemrograman Web'],
            ['id' => 5, 'kode' => 'BADA', 'mata_pelajaran' => 'Basis Data'],
            ['id' => 6, 'kode' => 'PAI', 'mata_pelajaran' => 'Pendidikan Agama Islam'],
            ['id' => 7, 'kode' => 'PKN', 'mata_pelajaran' => 'Pendidikan Kewarganegaraan'],
        ];

        DB::table('mata_pelajaran')->insert($data);
    }
}
