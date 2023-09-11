<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisModel extends Model
{
    use HasFactory;

    protected $table = 'jenis';

    protected $fillable = [
        'nama', 'deskripsi', 'icon'
    ];

    protected $hidden = [];

    public function parameter_uji()
    {
        return $this->hasMany(ParameterUjiModel::class, 'id_jenis', 'id');
    }
}
