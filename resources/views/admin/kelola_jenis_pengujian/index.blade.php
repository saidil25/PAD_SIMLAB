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
                <div class="card">

                    <div class="card-body">
                    <a href="{{ route('kelola_jenis_pengujian.create') }}" class="btn btn-sm btn-dark rounded-circle" style="width: 27px; height: 27px; padding: 0; display: flex; justify-content: center; align-items: center;">
                        <img src="{{ asset('gambar/plus.png') }}" alt="Tambah" width="15" height="15" style="border-radius: 50%;">
                    </a>



                        @php
                        $no = 1;
                        @endphp

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Icon</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($all_data as $dt)
                                <tr>
                                    <td><button style="padding: 6px 12px 6px 12px;" class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                    <td><a href="{{ asset($dt->icon) }}" target="_blank" rel="noopener noreferrer"><img src="{{ asset($dt->icon) }}" alt="" width="48px"></a></td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{!! $dt->deskripsi !!}</td>

                                    <td class="">
                                        <div class="btn-group dropup">
                                            <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('kelola_jenis_pengujian.edit', $dt->id) }}">Ubah</a>
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
                                                    <form action="{{ route('kelola_jenis_pengujian.destroy', $dt->id) }}" method="POST">
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