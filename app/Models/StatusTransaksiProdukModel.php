<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTransaksiProdukModel extends Model
{
    use HasFactory;

    protected $table = 'status_transaksi_produk';

    protected $fillable = [
        'id_status', 'id_transaksi_produk', 'tanggal', 'catatan', 'berkas'
    ];

    protected $hidden = [];

    public function status()
    {
        return $this->hasOne(StatusModel::class, 'id', 'id_status');
    }
}
