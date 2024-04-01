<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap', 'alamat', 'tanggal_lahir', 'nomor_handphone', 'email', 'dokumen', 'id_jabatan', 'id_departmen'];

    protected $casts = [
        'dokumen' => 'json',
    ];
}
