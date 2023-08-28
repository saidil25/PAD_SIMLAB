<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerModel;
use App\Models\KonfigurasiModel;
use Exception;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toptitle = 'Pengaturan';
        $title = 'Konfigurasi Sistem';
        $subtitle = 'Setting Konfigurasi';

        $data_edit = KonfigurasiModel::first();
        $all_data_banner = BannerModel::all();

        return view('admin.konfigurasi.edit', compact(
            'toptitle',
            'title',
            'subtitle',
            'all_data_banner',
            'data_edit'
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
        $konfigurasi = KonfigurasiModel::findOrFail($id);

        $logo = $konfigurasi->logo;
        $kop_surat = $konfigurasi->kop_surat;
        $petunjuk_penggunaan = $konfigurasi->petunjuk_penggunaan;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileNameLogo = auth()->user()->id . time() . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/logo';
            $file->move($destinationPath, $fileNameLogo);
            try {
                unlink(public_path() . '/' . $logo);
            } catch (Exception $e) {
            }
            $logo = 'logo/' . $fileNameLogo;
            $dataUp['logo'] = $logo;
        }

        if ($request->hasFile('kop_surat')) {
            $fileKop = $request->file('kop_surat');
            $fileNameKop = auth()->user()->id . time() . uniqid() . auth()->user()->id . '.' . $fileKop->getClientOriginalExtension();
            $destinationPath = public_path() . '/logo';
            $fileKop->move($destinationPath, $fileNameKop);
            try {
                unlink(public_path() . '/' . $kop_surat);
            } catch (Exception $e) {
            }

            $kop_surat = 'logo/' . $fileNameKop;
            $dataUp['kop_surat'] = $kop_surat;
        }

        if ($request->hasFile('petunjuk_penggunaan')) {
            $filePet = $request->file('petunjuk_penggunaan');
            $fileNamePet = auth()->user()->id . time() . uniqid() . auth()->user()->id . '.' . $filePet->getClientOriginalExtension();
            $destinationPath = public_path() . '/logo';
            $filePet->move($destinationPath, $fileNamePet);
            try {
                unlink(public_path() . '/' . $petunjuk_penggunaan);
            } catch (Exception $e) {
            }

            $petunjuk_penggunaan = 'logo/' . $fileNamePet;
            $dataUp['petunjuk_penggunaan'] = $petunjuk_penggunaan;
        }

        $dataUp['kontak'] = $request->kontak;
        $dataUp['alamat'] = $request->alamat;
        $dataUp['maps'] = $request->maps;
        $dataUp['instagram'] = $request->instagram;
        $dataUp['youtube'] = $request->youtube;
        $dataUp['website'] = $request->website;
        $dataUp['nama_sistem'] = $request->nama_sistem;
        $dataUp['nama_instansi'] = $request->nama_instansi;

        $konfigurasi->update($dataUp);
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
        //
    }
}
