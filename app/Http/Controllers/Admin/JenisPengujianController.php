<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisModel;
use Illuminate\Http\Request;

class JenisPengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Master Data';
        $title = 'Data Jenis Pengujian';
        $subtitle = 'Data Jenis Pengujian';

        $all_data = JenisModel::all();

        return view('admin.kelola_jenis_pengujian.index', compact(
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
        $title = 'Data Jenis Pengujian';
        $subtitle = 'Tambah Jenis Pengujian';

        return view('admin.kelola_jenis_pengujian.create', compact(
            'toptitle',
            'title',
            'subtitle',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'max:500'
        ]);

        $gambar = "";
        if ($file = $request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $gambar = 'berkas/' . $fileName;
        }

        $data_input = JenisModel::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'icon' => $gambar,
        ]);

        return redirect()->route('kelola_jenis_pengujian.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Data Jenis Pengujian';
        $subtitle = 'Edit Jenis Pengujian';

        $data_edit = JenisModel::where('id', $id)->first();

        return view('admin.kelola_jenis_pengujian.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'data_edit',
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
            'gambar' => 'max:500'
        ]);

        $data_up = JenisModel::findOrFail($id);

        $fileName = $data_up->gambar;

        if ($file = $request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['icon'] = 'berkas/' . $fileName;
        }

        $dataUp['deskripsi'] = $request->deskripsi;
        $dataUp['nama'] = $request->nama;

        $data_up = JenisModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('kelola_jenis_pengujian.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = JenisModel::find($id);
        $data_del->delete();
        return redirect()->route('kelola_jenis_pengujian.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
