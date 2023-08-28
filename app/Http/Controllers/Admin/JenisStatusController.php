<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusModel;
use Illuminate\Http\Request;

class JenisStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Master Data';
        $title = 'Kelola Jenis Status';
        $subtitle = 'Data Jenis Status';

        $all_data = StatusModel::all();

        return view('admin.kelola_jenis_status.index', compact(
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
        $title = 'Kelola Jenis Status';
        $subtitle = 'Tambah Jenis Status';

        return view('admin.kelola_jenis_status.create', compact(
            'toptitle',
            'title',
            'subtitle',
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $data_input = StatusModel::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kelola_jenis_status.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Kelola Jenis Status';
        $subtitle = 'Edit Jenis Status';

        $data_edit = StatusModel::where('id', $id)->first();

        return view('admin.kelola_jenis_status.edit', compact(
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
        ]);

        $data_up = StatusModel::findOrFail($id);

        $dataUp['deskripsi'] = $request->deskripsi;
        $dataUp['nama'] = $request->nama;

        $data_up->update($dataUp);
        return redirect()->route('kelola_jenis_status.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_del = StatusModel::find($id);
        $data_del->delete();
        return redirect()->route('kelola_jenis_status.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
