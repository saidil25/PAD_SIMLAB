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
                        <!-- <a href="{{ route('kelola_jenis_pengujian.create') }}" class="btn btn-sm btn-primary">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                </svg>
                            </span>
                            {{ 'Tambah ' . $subtitle }}
                        </a> -->

                        @php
                        $no = 1;
                        @endphp

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Order</th>
                                    <th>Kode Sampel</th>
                                    <th>Nama Produk</th>
                                    <th>Parameter Uji</th>
                                    <th>Satuan</th>
                                    <th>Kode SNI</th>
                                    <th>Status Uji</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($all_data as $dt)
                                <tr>
                                    <td><button class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                    <td>{{ '604.1/' . $dt->id }}</td>
                                    <td>{{ $dt->id . '/BB/' . date('Y', strtotime($dt->created_at)) }}</td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{{ $dt->nama_parameter_uji }}</td>
                                    <td>{{ $dt->satuan_parameter_uji }}</td>
                                    <td>{{ $dt->kode_sni_parameter_uji }}</td>

                                    <td class="">
                                        <div class="btn-group dropup">
                                            <button type="button" class="mb-0 px-3 border-radius-sm btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#hapusData{{ $dt->id }}">
                                                Lihat Detail
                                            </button>
                                        </div>
                                    </td>

                                    <div class="modal fade" id="hapusData{{ $dt->id }}">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        <strong>
                                                            {{ $dt->nama }}
                                                        </strong>
                                                        <small>
                                                            <br>No. Order: {{ '604.1/' . $dt->id }}
                                                            <br>Kode Sampel: {{ $dt->id . 'BB/' . date('Y', time()) }}
                                                        </small>
                                                    </h5>
                                                </div>

                                                <div class="modal-body">
                                                    @foreach($dt->status_uji as $dt_status)
                                                    <ul>
                                                        <li>{{ $dt_status->status->nama . ' | ' . $dt_status->created_at }} | <a href="{{ asset($dt_status->berkas) }}" target="_blank" rel="noopener noreferrer"><strong><i>Lihat Berkas</i></strong></a></li>
                                                    </ul>
                                                    @endforeach
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