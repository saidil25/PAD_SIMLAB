<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\TransaksiProdukModel;
use Illuminate\Http\Request;

class StatusUjiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Status Uji';
        $subtitle = 'Data Status Uji';

        $all_data = TransaksiProdukModel::with('status_uji.status')
            ->leftJoin('transaksi', function ($join) {
                $join->on('transaksi_produk.id_transaksi', '=', 'transaksi.id');
            })
            ->leftJoin('parameter_uji', function ($join) {
                $join->on('parameter_uji.id', '=', 'transaksi_produk.id_parameter_uji');
            })
            ->where('transaksi.id_user', auth()->user()->id)
            ->get([
                'transaksi_produk.id as id',
                'transaksi_produk.nama as nama',
                'parameter_uji.nama as nama_parameter_uji',
                'parameter_uji.tarif as tarif_parameter_uji',
                'parameter_uji.satuan as satuan_parameter_uji',
                'parameter_uji.kode_sni as kode_sni_parameter_uji'
            ]);

        return view('pengguna.status_uji.index', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data',
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
        $title = 'Status Uji';
        $subtitle = 'Data Status Uji';

        $detail_data = TransaksiProdukModel::with('status_uji')
            ->where('id', $id)
            ->first();

        return view('pengguna.status_uji.detail', compact(
            'toptitle',
            'title',
            'subtitle',
            'detail_data',
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
