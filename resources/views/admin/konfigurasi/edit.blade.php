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

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card col-md-12">
                    <div class="card-body">
                        <form class="row mt-3" method="POST" action="{{ route('konfigurasi.update', $data_edit->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group col-md-6">
                                <label class="">Nama Sistem</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->nama_sistem }}" name="nama_sistem" class="form-control form-control-normal" placeholder="Nama Sistem">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Nama Instansi</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->nama_instansi }}" name="nama_instansi" class="form-control form-control-normal " placeholder="Nama Instansi">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Alamat</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->alamat }}" name="alamat" class="form-control form-control-normal " placeholder="Alamat">
                                </div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label class="">Maps</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->maps }}" name="maps" class="form-control form-control-normal " placeholder="Maps">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Instagram</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->instagram }}" name="instagram" class="form-control form-control-normal " placeholder="Instagram">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Youtube</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->youtube }}" name="youtube" class="form-control form-control-normal " placeholder="Youtube">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Website</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->website }}" name="website" class="form-control form-control-normal " placeholder="Website">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Kontak (Contoh: +6281122223333)</label>
                                <div class="">
                                    <input type="number" value="{{ $data_edit->kontak }}" name="kontak" class="form-control form-control-normal " placeholder="Kontak">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Logo</label>
                                <div class="">
                                    <input onchange="readURL(this);" type="file" name="logo" class="form-control form-control-normal mb-2" placeholder="Logo">
                                    <img style="border: solid gray 1px; padding:6px; border-radius:6px;" height="80px" id="logo" src="{{ asset($data_edit->logo) }}" alt="" />
                                </div>
                                <script>
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                $('#logo').attr('src', e.target.result);
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Kop Surat</label>
                                <div class="">
                                    <input onchange="readURLKop(this);" type="file" name="kop_surat" class="form-control form-control-normal mb-2" placeholder="Kop Surat">
                                    <img style="border: solid gray 1px; padding:6px; border-radius:6px;" height="80px" id="kop_surat" src="{{ asset($data_edit->kop_surat) }}" alt="" />
                                </div>
                                <script>
                                    function readURLKop(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                $('#kop_surat').attr('src', e.target.result);
                                            };
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Petunjuk Penggunaan | <a href="{{ asset($data_edit->petunjuk_penggunaan) }}" target="_blank" rel="">Lihat Berkas</a></label>
                                <div class="">
                                    <input type="file" name="petunjuk_penggunaan" class="form-control form-control-normal mb-2" placeholder="Petunjuk Penggunaan">
                                </div>
                            </div>

                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-dark rounded-pill">
                                    <i class="far fa-save" style="margin-right: 8px;"></i> Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="card col-md-12 mt-5">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <strong>Kelola Banner</strong>
                            <a href="{{ route('kelola_banner.create') }}" class="col-md-2 btn btn-sm btn-primary float-right">
                                <span class="svg-icon svg-icon-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                {{ 'Tambah Banner' }}
                            </a>
                        </div>

                        @php
                        $no = 1;
                        @endphp

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Urutan</th>
                                    <th>Judul</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($all_data_banner as $dt)
                                <tr>
                                    <td><button style="padding: 6px 12px 6px 12px;" class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                    <td>{{ $dt->urutan }}</td>
                                    <td>{{ $dt->judul }}</td>
                                    <td>
                                        <img src="{{ asset($dt->gambar) }}" width="120px" alt="">
                                    </td>

                                    <td class="">
                                        <div class="btn-group dropup">
                                            <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('kelola_banner.edit', $dt->id) }}">Ubah</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt->id }}">Hapus</a>
                                            </div>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="hapusData{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title"><strong>Hapus Data {{ $dt->judul }} ?</strong></h5>
                                                </div>

                                                <div class="modal-body">
                                                    <form action="{{ route('kelola_banner.destroy', $dt->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')

                                                        <div class="col text-center">
                                                            <p>Tekan <strong>Hapus</strong> untuk menghapus data {{ $dt->judul }} ! </p>

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
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->

@endsection