<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $table = 'murid';

    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'no_telp',
        'jenis_kelamin',
        'tgl_lahir',
        'id_user',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke Nilai
    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_murid');
    }
}
