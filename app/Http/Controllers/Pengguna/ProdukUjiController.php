<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\TransaksiProdukModel;
use Illuminate\Http\Request;

class ProdukUjiController extends Controller
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

    public function store(Request $request)
    {
        $request->validate([
            'id_transaksi' => 'required',
            'id_parameter_uji' => 'required',
            'nama' => 'required',
            'jumlah' => 'required',
        ]);

        $data_input = TransaksiProdukModel::create([
            'id_transaksi' => $request->id_transaksi,
            'id_parameter_uji' => $request->id_parameter_uji,
            'nama' => $request->nama,
            'jumlah' => $request->jumlah,
        ]);

        // $dataUp['kode_sampel'] = $data_input->id . '/BB/' . date('Y', time());
        // $data_input->update($dataUp);

        return redirect()->route('pengajuan.show', $request->id_transaksi)->with(['success' => 'Data Berhasil Disimpan']);
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
        $data_del = TransaksiProdukModel::find($id);
        $data_del->delete();
        return redirect()->route('pengajuan.show', $data_del->id_transaksi)->with(['success' => 'Data Berhasil Dihapus']);
    }
}
