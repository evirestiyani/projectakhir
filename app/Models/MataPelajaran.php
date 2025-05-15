<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan nama default
    protected $table = 'mata_pelajaran';

    // Tentukan kolom yang bisa diisi (fillable) oleh mass assignment
    protected $fillable = [
        'kode',
        'mata_pelajaran',
    ];

    // Tentukan apakah kita ingin menggunakan auto-increment untuk id
    public $incrementing = true;

    // Jika kolom 'id' bukan tipe integer, tambahkan tipe data
    protected $keyType = 'int';
}
