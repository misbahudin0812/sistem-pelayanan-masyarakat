<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileDesa extends Model
{
    use HasFactory;
    protected $fillable = [
        'tentang_desa',
        'gambar',
        'link_peta',
        'visi',
        'misi',
    ];
}
