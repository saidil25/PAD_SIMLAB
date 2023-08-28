<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\ParameterUjiModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiProdukModel;
use App\Models\User;
use Illuminate\Http\Request;

class CetakPermintaanPengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toptitle = 'Fitur';
        $title = 'Cetak Permintaan Pengajuan';
        $subtitle = 'Detail Cetak Permintaan Pengajuan';

        // $all_data = TransaksiModel::with('jenis')->where('id', $id)->first();

        $all_data = TransaksiProdukModel::with('jenis')
        ->where('id', $id)
        ->orderBy('id', 'DESC')
        ->get();

        $transaksi_produk = TransaksiProdukModel::with('parameter_uji')
            ->where('id_transaksi', $id)
            ->get();
        $data_user = User::where('id', $all_data->id_user)
            ->select('name', 'alamat', 'nomor_hp')
            ->first();

        return view('pengguna.cetak_permintaan_pengujian.detail', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data',
            'data_user',
            'transaksi_produk',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
