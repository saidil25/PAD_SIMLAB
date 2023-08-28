<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisModel;
use App\Models\ParameterUjiModel;
use Illuminate\Http\Request;

class ParameterPengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Master Data';
        $title = 'Data Parameter Uji';
        $subtitle = 'Data Parameter Uji';

        $all_data = ParameterUjiModel::all();

        return view('admin.kelola_parameter_uji.index', compact(
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
        $toptitle = 'Master Data';
        $title = 'Data Parameter Uji';
        $subtitle = 'Tambah Parameter Uji';

        $data_jenis_Pengujian = JenisModel::all();

        return view('admin.kelola_parameter_uji.create', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_jenis_Pengujian',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $data_input = ParameterUjiModel::create([
            'id_jenis' => $request->id_jenis,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tarif' => $request->tarif,
            'satuan' => $request->satuan,
            'kode_sni' => $request->kode_sni,
        ]);

        return redirect()->route('kelola_parameter_uji.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $toptitle = 'Fitur';
        $title = 'Data Parameter Uji';
        $subtitle = 'Edit Parameter Uji';

        $data_edit = ParameterUjiModel::where('id', $id)->first();
        $data_jenis_Pengujian = JenisModel::all();

        return view('admin.kelola_parameter_uji.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
            'data_jenis_Pengujian',
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

        $data_up = ParameterUjiModel::findOrFail($id);

        $dataUp['id_jenis'] = $request->id_jenis;
        $dataUp['nama'] = $request->nama;
        $dataUp['deskripsi'] = $request->deskripsi;
        $dataUp['tarif'] = $request->tarif;
        $dataUp['satuan'] = $request->satuan;
        $dataUp['kode_sni'] = $request->kode_sni;

        $data_up = ParameterUjiModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('kelola_parameter_uji.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = ParameterUjiModel::find($id);
        $data_del->delete();
        return redirect()->route('kelola_parameter_uji.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
