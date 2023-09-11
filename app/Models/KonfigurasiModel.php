<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfigurasiModel extends Model
{
    use HasFactory;

    protected $table = 'konfigurasi';

    protected $fillable = [
        'nama_sistem', 'kop_surat', 'nama_instansi',
        'logo', 'kontak', 'alamat', 'maps', 'instagram', 'youtube',
        'website', 'petunjuk_penggunaan'
    ];

    protected $hidden = [];
}
