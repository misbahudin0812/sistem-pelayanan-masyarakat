<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_surat',
            'nik',
            'alamat',
            'jenis_kelamin',
            'jenis_surat',
            'scan1',
            'status',
          'tgl_surat',
          'tgl_lahir',
    ];
}
