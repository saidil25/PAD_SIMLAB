<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransaksiProdukModel;

class ProdukController extends Controller
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
        $data_edit = TransaksiProdukModel::where('id', $id)->first();
        return view('admin.pembayaran.edit-produk', compact('data_edit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toptitle = 'Fitur';
        $title = 'Pengajuan';
        $subtitle = 'Tindak Lanjut Pengajuan';

        $data_edit = TransaksiProdukModel::with('parameter_uji')->where('id', $id)->first();

        return view('admin.pembayaran.edit-produk', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit'
        ));
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
        $request->validate([
            'nama' => 'required',
        ]);

        $data_up = TransaksiProdukModel::where('id', $id)->first();
        $dataUp['nama'] = $request->nama;
        $dataUp['no_order'] = $request->no_order;
        $dataUp['kode_sampel'] = $request->kode_sampel;
        $dataUp['jumlah'] = $request->jumlah;

        $data_up->update($dataUp);
        return redirect()->route('pengajuan_uji.edit', $data_up->id_transaksi)->with(['success' => 'Data Berhasil Disimpan']);
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
