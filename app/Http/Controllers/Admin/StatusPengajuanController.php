<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusModel;
use App\Models\StatusTransaksiProdukModel;
use App\Models\TransaksiModel;
use App\Models\TransaksiProdukModel;
use Illuminate\Http\Request;

class StatusPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Status Pengujian';
        $subtitle = 'Data Status Pengujian';

        $all_data = TransaksiProdukModel::with('parameter_uji')
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.status_pengujian.index', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data'
        ));
    }

    public function export()
    {
        $toptitle = 'Fitur';
        $title = 'Status Pengujian';
        $subtitle = 'Data Status Pengujian';

        $all_data = TransaksiProdukModel::with('status_uji.status')
            ->leftJoin('transaksi', 'transaksi_produk.id_transaksi', '=', 'transaksi.id')
            ->leftJoin('parameter_uji', 'transaksi_produk.id_parameter_uji', '=', 'parameter_uji.id')
            ->leftJoin('users', 'transaksi.id_user', '=', 'users.id')
            ->select(
                'transaksi_produk.*',
                'users.name as nama_pelanggan',
                'users.alamat',
                'users.nomor_hp',
                'parameter_uji.nama as jenis_pekerjaan',
                'parameter_uji.tarif as tarif_uji',
                'parameter_uji.satuan as satuan_uji',
                'transaksi.kegiatan as paket_pekerjaan',
            )
            ->where('transaksi.kegiatan', '!=', null)
            ->orderBy('id', 'DESC')
            ->get();

        return view('admin.status_pengujian.export', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data'
        ));
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
        $title = 'Status Pengujian';
        $subtitle = 'Data Status Pengujian';

        $detail_data = TransaksiProdukModel::with('parameter_uji')->where('id', $id)->first();
        $data_status_Pengujian = StatusTransaksiProdukModel::with('status')
            ->where('id_transaksi_produk', $id)
            ->orderBy('id', 'DESC')
            ->get();
        $data_pilih_status = StatusModel::all();

        // $status_dilewati = StatusTransaksiProdukModel::where('id_status' $data)

        return view('admin.status_pengujian.detail', compact(
            'toptitle',
            'title',
            'subtitle',
            'detail_data',
            'data_status_Pengujian',
            'data_pilih_status',
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
