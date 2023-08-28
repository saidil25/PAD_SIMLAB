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

                        <a class="btn btn-sm btn-success" href="{{ route('status_pengujian.export') }}" target="_blank" rel="noopener noreferrer">Export All</a>

                        @php
                        $no = 1;
                        @endphp

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Parameter Uji</th>
                                    <th>No. Pesanan</th>
                                    <th>Kode Sampel</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($all_data as $dt)
                                <tr>
                                    <td><button style="padding: 6px 12px 6px 12px;" class="btn btn-secondary btn-sm">{{ $no++ }}</button></td>
                                    <td>{{ $dt->nama }}</td>
                                    <td>{{ $dt->parameter_uji->nama }}</td>
                                    <td width="120px">{{ '604.1/' . $dt->id }}</td>
                                    <td width="150px">{{ $dt->id . '/BB/' . date('Y', strtotime($dt->created_at)) }}</td>

                                    <td class="" width="120px">
                                        <a class="btn btn-sm btn-info" style="padding: 6px 16px 6px 16px;" href="{{ route('status_pengujian.show', $dt->id) }}">Tindak Lanjut</a>
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
            <!--end::Col-->
        </div>
        <!--end::Row-->

    </div>
    <!--end::Content container-->
</div>
<!--end::Content-->

@endsection