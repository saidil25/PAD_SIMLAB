@extends('layouts.main')
@section('content')


<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        @if(auth()->user()->role == 'Pengguna')
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->
           
            <!--end::Col-->

            <div class="col-md-10 col-lg-10 col-xl-10 col-xxl-10 ">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="text-light">
                            <h5 class="text-light">*Perhatikan</h5>
                            1. Lakukan pembayaran di <strong>Kantor BPJK DIY</strong> setelah melakukan order.<br>
                            2. Anda harus membawa berkas PERMINTAAN PENGUJIAN yang didapat melalui sistem <strong>{{ $service['data_konfig']->nama_sistem }}</strong><br>
                            3. Anda dapan mengunduh berkas tersebut pada menu <strong>Pengajuan</strong> -> <strong>Lihat Detail</strong> pada kolom <strong>Parameter Uji</strong>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
        @else
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">
                <div class="card">

                    <div class="card-body">

                        <form class="row mb-3" action="" method="get">

                            <div class="col-md-3">
                                <label for="jenis_layanan">Jenis Layanan</label>
                                <select class="form-select" data-control="select2" id="jenis_layanan" name="jenis_layanan">
                                    <option value="">Pilih Jenis Layanan..</option>
                                    @foreach($jenis_pengujian as $jp)
                                    <option value="{{ $jp->id }}" @if($jp->id==$jenis_layanan ) selected @endif>{{ $jp->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="status_transaksi">Status Transaksi</label>
                                <select class="form-select" data-control="select2" id="status_transaksi" name="status_transaksi">
                                    <option value="">Pilih Status..</option>
                                    <option @if($status_transaksi=='Belum Dibayar' ) selected @endif>Belum Dibayar</option>
                                    <option @if($status_transaksi=='Sudah Dibayar' ) selected @endif>Sudah Dibayar</option>
                                    <option @if($status_transaksi=='Ditolak' ) selected @endif>Ditolak</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="tgl_1">Tanggal Awal</label>
                                <input name="tgl_1" class="form-control input-lg" value="{{ $tgl_1 }}" placeholder="" type="date">
                            </div>
                            <div class="col-md-2">
                                <label for="tgl_2">Tanggal Akhir</label>
                                <input name="tgl_2" class="form-control input-lg" value="{{ $tgl_2 }}" placeholder="" type="date">
                            </div>

                            <div class="col-md-1">
                                <button class="btn btn-sm btn-primary" type="submit" style="margin-top: 25px;">Filter</button>
                            </div>
                        </form>
                        {{-- <a class="btn btn-sm btn-success" href="{{ route('status_pengujian.export') }}" target="_blank" rel="noopener noreferrer">Export All</a> --}}

                        @php
                        $no = 1;
                        @endphp

                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>No. Order</th>
                                        <th>Kode Sampel</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Kegiatan</th>
                                        {{-- <th>Nama Produk</th> --}}
                                        {{-- <th>No. Dokumen</th> --}}
                                        {{-- <th>Sumber</th> --}}
                                        <th>Status Order</th>
                                        {{-- <th>Status Uji</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($all_data as $dt)
                                    <tr>
                                        <td><button style="padding: 6px 12px 6px 12px;" class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                        <td>{{ date('d/m/Y', strtotime($dt->created_at)) }}</td>
                                        <td>{{ $dt->no_order }}</td>
                                        <td>{{ $dt->kode_sampel }}</td>
                                        <td>@if($dt->user != null){{ $dt->user->name }} @else User Dihapus @endif</td>
                                        <td>{{ $dt->kegiatan }}</td>
                                        {{-- <td>{{ $dt->nama }}</td> --}}
                                        {{-- <td>{{ $dt->no_dokumen }}</td> --}}
                                        {{-- <td>{{ $dt->created_at }}</td> --}}
                                        {{-- <td>{{ $dt->sumber }}</td> --}}
                                        <td>
                                            <i class="
                                            @if($dt->status_bayar=='Sudah Dibayar') text-success 
                                            @elseif($dt->status_bayar=='Belum Dibayar') text-danger 
                                            @elseif($dt->status_bayar=='Ditolak') text-danger 
                                            @else text-primary 
                                            @endif">
                                            <u><strong>{{ $dt->status_bayar }}</strong></u></i>
                                            {{-- @if($dt->status_bayar==NULL)
                                                <i class="text-danger"><u><strong>Belum Dibayar</strong></u></i>
                                            @endif --}}
                                            <br>
                                            @if($dt->status_bayar=='Ditolak')
                                            <i>
                                                <small>
                                                    <strong>Catatan:</strong>
                                                    {{ $dt->catatan }}
                                                </small>
                                            </i>
                                            @endif
                                            
                                        </td>

                                        {{-- <td>
                                            {{ $dt->id_status }}
                                        </td> --}}

                                        <td class="">
                                            <div class="btn-group dropup">
                                                <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                    Aksi
                                                </button>
                                                <div class="dropdown-menu">
                                                    @if($dt->user != null)
                                                    <a class="dropdown-item" href="{{ route('pengajuan_uji.edit', $dt->id) }}">Tindakan</a>
                                                    @endif
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt->id }}">Hapus</a>
                                                </div>
                                            </div>
                                        </td>

                                        <div class="modal fade" id="hapusData{{ $dt->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><strong>Hapus Data {{ $dt->kegiatan }} ?</strong></h5>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{ route('pengajuan_uji.destroy', $dt->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')

                                                            <div class="col text-center">
                                                                <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->kegiatan }} ! </p>

                                                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
        @endif

    </div>
    <!--end::Content container-->
</div>

@endsection


