<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;

class GuruSeeder extends Seeder
{
    public function run(): void
    {
        Guru::insert([
            [
                'id' => 1,
                'nama' => 'Budi Santoso S.Pd',
                'nip' => '196504121990031002',
                'email' => 'budi.santoso@smk.ac.id',
                'no_telp' => '081234567890',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1965-04-12',
                'id_user' => 2, // Perlu dipastikan id_user yang benar
                'mata_pelajaran' => 1, // Perlu dipastikan id_mata_pelajaran yang benar
            ],
            [
                'id' => 2,
                'nama' => 'Siti Rahayu S.Pd',
                'nip' => '198107252005012003',
                'email' => 'siti.rahayu@smk.ac.id',
                'no_telp' => '081345678901',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1981-07-25',
                'id_user' => 3, // Perlu dipastikan id_user yang benar
                'mata_pelajaran' => 2, // Perlu dipastikan id_mata_pelajaran yang benar
            ],
             [
                'id' => 3,
                'nama' => 'H. Dewi Lestari, S.Pd',
                'nip' => '199001152010012005',
                'email' => 'dewi.lestari@smk.ac.id',
                'no_telp' => '081456789012',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1990-01-15',
                'id_user' => 4, // Perlu dipastikan id_user yang benar
                'mata_pelajaran' => 3, // Perlu dipastikan id_mata_pelajaran yang benar
            ],
            [
                 'id' => 4,
                'nama' => 'Drs. Ahmad Hidayat S.T',
                'nip' => '199208172015031001',
                'email' => 'ahmad.hidayat@smk.ac.id',
                'no_telp' => '081567890123',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1992-08-17',
                'id_user' => 5, // Perlu dipastikan id_user yang benar
                'mata_pelajaran' => 4,  // Perlu dipastikan id_mata_pelajaran yang benar
            ],
            [
                 'id' => 5,
                'nama' => 'Rina Fitriani, S.Kom',
                'nip' => '199503062018011001',
                'email' => 'rina.fitriani@smk.ac.id',
                'no_telp' => '081678901234',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1995-03-06',
                'id_user' => 6, // Perlu dipastikan id_user yang benar
                'mata_pelajaran' => 5, // Perlu dipastikan id_mata_pelajaran yang benar
            ],
            [
                'id' => 6,
                'nama' => 'H. Syamsul Arifin, S.Ag',
                'nip' => '196811221990091009',
                'email' => 'syamsul.arifin@smk.ac.id',
                'no_telp' => '081234567898',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1968-11-22',
                'id_user' => 7, // Perlu dipastikan id_user yang benar
                'mata_pelajaran' => 6, // Perlu dipastikan id_mata_pelajaran yang benar
            ],
            [
                'id' => 7,
                'nama' => 'Hj. Nurhayati, S.Pd, M.Pd',
                'nip' => '197609111996071007',
                'email' => 'nurhayati@smk.ac.id',
                'no_telp' => '081234567896',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1976-09-11',
                'id_user' => 8, // Perlu dipastikan id_user yang benar.
                'mata_pelajaran' => 7, // Perlu dipastikan id_mata_pelajaran yang benar.
            ],
            [
                'id' => 8,
                'nama' => 'Siti Marlia S.Pd',
                'nip' => '197203051995012003',
                'email' => 'siti.marlia@smk.ac.id',
                'no_telp' => '081234567891',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1972-03-05',
                'id_user' => 9,
                'mata_pelajaran' => 1,
            ],
            [
                'id' => 9,
                'nama' => 'Andri Gunawan M.Kom',
                'nip' => '198108101998022004',
                'email' => 'andri.gunawan@smk.ac.id',
                'no_telp' => '081234567892',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1981-08-10',
                'id_user' => 10,
                'mata_pelajaran' => 2,
            ],
            [
                'id' => 10,
                'nama' => 'Dewi Kartika S.T., M.T',
                'nip' => '198511221999032005',
                'email' => 'dewi.kartika@smk.ac.id',
                'no_telp' => '081234567893',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1985-11-22',
                'id_user' => 11,
                'mata_pelajaran' => 3,
            ],
            [
                'id' => 11,
                'nama' => 'Ahmad Fauzi S.Pd., M.Pd',
                'nip' => '197911011996042006',
                'email' => 'ahmad.fauzi@smk.ac.id',
                'no_telp' => '081234567894',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1979-11-01',
                'id_user' => 12,
                'mata_pelajaran' => 4,
            ],
            [
                'id' => 12,
                'nama' => 'Lilis Nuraini S.Kom',
                'nip' => '198910151997052007',
                'email' => 'lilis.nuraini@smk.ac.id',
                'no_telp' => '081234567895',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1989-10-15',
                'id_user' => 13,
                'mata_pelajaran' => 5,
            ],
            [
                'id' => 13,
                'nama' => 'Hendra Suhendra M.Si',
                'nip' => '197706301994062008',
                'email' => 'hendra.suhendra@smk.ac.id',
                'no_telp' => '081234567896',
                'jenis_kelamin' => 'L',
                'tanggal_lahir' => '1977-06-30',
                'id_user' => 14,
                'mata_pelajaran' => 6,
            ],
             [
                'id' => 14,
                'nama' => 'Ratna Dewi S.Pd',
                'nip' => '198003101995072009',
                'email' => 'ratna.dewi@smk.ac.id',
                'no_telp' => '081234567897',
                'jenis_kelamin' => 'P',
                'tanggal_lahir' => '1980-03-10',
                'id_user' => 15,
                'mata_pelajaran' => 7,
            ],
        ]);
    }
}
