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
                        <!-- <a href="{{ route('kelola_jenis_pengujian.create') }}" class="btn btn-sm btn-success">
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                </svg>
                            </span>
                            Export Excel
                        </a> -->

                        <button onclick="ExportToExcel('xlsx')" class="btn btn-sm btn-success">Unduh Data Excel</button>

                        @php
                        $no = 1;
                        @endphp
                        <div class="table-responsive">
                            <table onload="ExportToExcel('xlsx')" id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kegiatan</th>
                                        <th>No. Order</th>
                                        <th>Kode Sampel</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Alamat Pelanggan</th>
                                        <th>No. HP</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Jumlah Sampel</th>
                                        <th>Nama Sampel</th>
                                        <th>Paket Pekerjaan</th>
                                        <th>Tarif</th>
                                        <th>Tanggal Penting</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($all_data as $dt)
                                    <tr>
                                        <td><button style="padding: 6px 12px 6px 12px;" class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                        <td>{{ date('d-m-Y', strtotime($dt->created_at)) }}</td>
                                        <td>{{ $dt->paket_pekerjaan }}</td>
                                        <td>{{ '604.1/' . $dt->id }}</td>
                                        <td>{{ $dt->id . '/BB/' . date('Y', strtotime($dt->created_at)) }}</td>
                                        <td>{{ $dt->nama_pelanggan }}</td>
                                        <td>{{ $dt->alamat }}</td>
                                        <td>{{ $dt->nomor_hp }}</td>
                                        <td>{{ $dt->jenis_pekerjaan }}</td>
                                        <td>{{ $dt->jumlah }}</td>
                                        <td>{{ $dt->nama }}</td>
                                        <td>{{ $dt->paket_pekerjaan }}</td>
                                        <td>{{ $dt->jumlah }}</td>
                                        <td>
                                            @foreach($dt->status_uji as $dt_su)
                                            {{ $dt_su->status->nama . ' : tgl ' . date('d-m-Y', strtotime($dt_su->created_at)) . ' , ' }}
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            <script>
                                function ExportToExcel(type, fn, dl) {
                                    var elt = document.getElementById('example');
                                    var wb = XLSX.utils.table_to_book(elt, {
                                        sheet: "sheet1"
                                    });
                                    return dl ?
                                        XLSX.write(wb, {
                                            bookType: type,
                                            bookSST: true,
                                            type: 'base64'
                                        }) :
                                        XLSX.writeFile(wb, fn || ('pengujian_<?= date('d-m-Y', time()) ?>.' + (type || 'xlsx')));
                                }
                            </script>

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