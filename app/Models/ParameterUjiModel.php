<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterUjiModel extends Model
{
    use HasFactory;

    protected $table = 'parameter_uji';

    protected $fillable = [
        'id_jenis', 'nama', 'deskripsi', 'tarif', 'satuan', 'kode_sni'
    ];

    protected $hidden = [];

    public function jenis()
    {
        return $this->hasOne(JenisModel::class, 'id', 'id_jenis');
        // return $this->belongsTo(JenisModel::class,'id_jenis');
    }
}
