<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use App\Models\JenisModel;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use App\Models\PengunjungModel;
use App\Http\Controllers\Controller;
use App\Models\TransaksiProdukModel;
use App\Models\StatusTransaksiProdukModel;

class DataOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $toptitle = 'Fitur';
        $title = 'Data Transaksi';
        $subtitle = 'Data Transaksi';
    
        $jumlah_pengguna = User::where('role', '=', 'Pengguna')->count();
        $jumlah_pengunjung = PengunjungModel::count();
        $jumlah_jenis_pengajuan = JenisModel::count();
        $jumlah_pengajuan = TransaksiModel::count();
        $jumlah_pengajuan_selesai = StatusTransaksiProdukModel::leftJoin('status', 'id_status', '=', 'status.id')->where('status.nama', '=', 'Order Selesai')->count();
    
        $jumlah_pengajuan_user = TransaksiModel::where('id_user', auth()->user()->id)->count();
    
        $jenis_layanan = $request->jenis_layanan;
        $status_transaksi = $request->status_transaksi;
        $tgl_1 = $request->tgl_1;
        $tgl_2 = $request->tgl_2;
    
        $jenis_pengujian = JenisModel::orderBy('id', 'DESC')->get();
    
        $query = TransaksiModel::with('user')->orderBy('created_at', 'DESC');
        $query2 = StatusTransaksiProdukModel::where('id_transaksi_produk', 'query.id');
    
        if (!is_null($jenis_layanan)) {
            $query->where('id_jenis', $jenis_layanan);
        }
    
        if (!is_null($status_transaksi)) {
            $query->where('status_bayar', $status_transaksi);
        }
    
        if (!is_null($tgl_1)) {
            $query->whereDate('created_at', '>=', $tgl_1);
        }
    
        if (!is_null($tgl_2)) {
            $query->whereDate('created_at', '<=', $tgl_2);
        }
    
        $all_data = $query->get();
    
        $viewData = [
            'toptitle' => $toptitle,
            'title' => $title,
            'subtitle' => $subtitle,
            'jumlah_pengguna' => $jumlah_pengguna,
            'jumlah_pengunjung' => $jumlah_pengunjung,
            'jumlah_jenis_pengajuan' => $jumlah_jenis_pengajuan,
            'jumlah_pengajuan' => $jumlah_pengajuan,
            'jumlah_pengajuan_selesai' => $jumlah_pengajuan_selesai,
            'jumlah_pengajuan_user' => $jumlah_pengajuan_user,
            'jenis_pengujian' => $jenis_pengujian,
            'jenis_layanan' => $jenis_layanan,
            'status_transaksi' => $status_transaksi,
            'tgl_1' => $tgl_1,
            'tgl_2' => $tgl_2,
            'all_data' => $all_data,
           
        ];
    
        return view('admin.kelola_data_order.index', $viewData);
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
