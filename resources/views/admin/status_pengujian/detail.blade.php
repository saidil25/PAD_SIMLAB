@extends('layouts.main')
@section('content')

<!--begin::Content-->
<div id="kt_app_content" class="app-content flex-column-fluid">
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-fluid">
        <!--begin::Row-->
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <!--begin::Col-->

            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 mb-md-5 mb-xl-10">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form class="row mt-3" method="POST" action="{{ route('riwayat_status_pengujian.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-12 text-center">
                                Nama Produk<br>
                                <strong>{{ strtoupper($detail_data->nama) }}</strong><br>
                                Parameter Uji<br>
                                <strong>{{ strtoupper($detail_data->parameter_uji->nama) }}</strong><br>
                                Nomor Pesanan | Kode Sampel<br>
                                <strong>{{ $detail_data->no_order . ' | ' . $detail_data->kode_sampel }}</strong><br>
                            </div>
                            <hr>

                            <div class="form-group col-md-6" hidden>
                                <label class="">ID Transaksi Produk</label>
                                <div class="">
                                    <input value="{{ $detail_data->id }}" type="text" name="id_transaksi_produk" class="form-control form-control-normal" placeholder="ID Transaksi Produk">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Pilih Status Pengujian:</label>
                                <select class="form-select" data-control="select2" name="id_status" id="">
                                    @foreach($data_pilih_status as $dt)
                                    <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                                    @endforeach
                                </select>

                                {{-- <select class="form-select" data-control="select2" name="id_status" id="">
                                    <option>-- Select city -- </option>
                                    <option id="myoption">Los Angeles</option>
                                    <option>New York</option>
                                    <option>Houston</option>
                                    <option>Chicago</option>
                                  </select>
                                  
                                  <br />
                                  <button onclick="toggle(this)">Hide option</button>
                                  
                                  <script>
                                    let toggle = button => {
                                      let element = document.getElementById("myoption");
                                      let hidden = element.getAttribute("hidden");
                                      
                                      if (hidden) {
                                         element.removeAttribute("hidden");
                                         button.innerText = "Hide option";
                                      } else {
                                         element.setAttribute("hidden", "hidden");
                                         button.innerText = "Show option";
                                      }
                                    };
                                  </script> --}}
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Berkas</label>
                                <div class="">
                                    <input type="file" name="berkas" class="form-control form-control-normal" placeholder="Berkas">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Catatan</label>
                                <div class="">
                                    <textarea name="catatan" class="form-control form-control-normal" placeholder="Catatan"></textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save" style="margin-right: 8px;"></i> Simpan </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        @php
                        $no = 1;
                        @endphp

                        <strong>Riwayat Status Pengujian</strong>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>catatan</th>
                                        <th>Berkas</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
    
                                <tbody>
    
                                    @foreach($data_status_Pengujian as $dt_status)
                                    <tr>
                                        <td><button style="padding: 6px 12px 6px 12px;" class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                        <td>{{ $dt_status->status->nama }}</td>
                                        <td>{{ $dt_status->catatan }}</td>
                                        <td>
                                            <a href="{{ asset($dt_status->berkas) }}" target="_blank" rel="noopener noreferrer"><strong><i>Lihat Berkas</i></strong></a>
                                        </td>
                                        <td>{{ $dt_status->created_at }}</td>
    
                                        <td class="">
                                            <a class="btn btn-sm btn-info" style="padding: 6px 16px 6px 16px;" href="#" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt_status->id }}">Hapus</a>
                                        </td>
    
                                        <div class="modal fade" id="hapusData{{ $dt_status->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
    
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><strong>Hapus Data {{ $dt_status->status->nama }} ?</strong></h5>
                                                    </div>
    
                                                    <div class="modal-body">
                                                        <form action="{{ route('riwayat_status_pengujian.destroy', $dt_status->id) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
    
                                                            <div class="col text-center">
                                                                <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt_status->status->nama }} ! </p>
    
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
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->

@endsection