<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiProdukModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi_produk';

    protected $fillable = [
        'id_transaksi', 'no_order', 'kode_sampel',
        'id_parameter_uji', 'nama', 'jumlah'
    ];

    protected $hidden = [];

    public function transaksi()
    {
        return $this->hasOne(TransaksiModel::class, 'id', 'id_transaksi');
    }

    public function parameter_uji()
    {
        return $this->hasOne(ParameterUjiModel::class, 'id', 'id_parameter_uji');
    }

    public function status_uji()
    {
        return $this->hasMany(StatusTransaksiProdukModel::class, 'id_transaksi_produk', 'id');
    }
}
