<?php

namespace App\Http\Controllers\Pengguna;

use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Http\Controllers\Controller;
use App\Models\TransaksiProdukModel;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Fitur';
        $title = 'Beranda';
        $subtitle = 'Data Beranda';

        // $jumlah_pengajuan = TransaksiProdukModel::where('id_user', auth()->user()->id)->count();

        $jumlah_pengajuan = TransaksiModel::rightJoin('transaksi_produk', 'transaksi.id', '=', 'transaksi_produk.id_transaksi')->where('transaksi.id_user', auth()->user()->id)->count();

        return view('pengguna.beranda.index', compact(
            'toptitle',
            'title',
            'subtitle',
            'jumlah_pengajuan',
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
        //
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
