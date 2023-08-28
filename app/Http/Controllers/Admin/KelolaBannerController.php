<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use Illuminate\Http\Request;

class KelolaBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Setting';
        $title = 'Kelola Banner';
        $subtitle = 'Data Banner';

        $all_data = BannerModel::all();

        return view('admin.kelola_banner.index', compact(
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
        $toptitle = 'Setting';
        $title = 'Kelola Banner';
        $subtitle = 'Tambah Banner';

        return view('admin.kelola_banner.create', compact(
            'toptitle',
            'title',
            'subtitle',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
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

        $data_input = BannerModel::create([
            'judul' => $request->judul,
            'urutan' => $request->urutan,
            'gambar' => $gambar,
        ]);

        return redirect()->route('konfigurasi.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Kelola Banner';
        $subtitle = 'Edit Banner';

        $data_edit = BannerModel::where('id', $id)->first();

        return view('admin.kelola_banner.edit', compact(
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
            'judul' => 'required',
            'gambar' => 'max:500'
        ]);

        $data_up = BannerModel::findOrFail($id);

        $fileName = $data_up->gambar;

        if ($file = $request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/berkas';
            $file->move($destinationPath, $fileName);
            $dataUp['gambar'] = 'berkas/' . $fileName;
        }

        $dataUp['urutan'] = $request->urutan;
        $dataUp['judul'] = $request->judul;

        $data_up = BannerModel::findOrFail($id);
        $data_up->update($dataUp);
        return redirect()->route('konfigurasi.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = BannerModel::find($id);
        $data_del->delete();
        return redirect()->route('konfigurasi.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
