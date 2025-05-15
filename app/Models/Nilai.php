<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';

    protected $fillable = [
        'id_guru',
        'id_murid',
        'id_mata_pelajaran',
        'nilai',
        'predikat',
        'semester',
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    // Relasi ke Murid
    public function murid()
    {
        return $this->belongsTo(Murid::class, 'id_murid');
    }

    // Relasi ke Mata Pelajaran
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'id_mata_pelajaran');
    }
}
