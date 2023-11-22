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
            <div class="col-md-3 col-lg-3 col-xl-3 col-xxl-3 ">
                <div class="card bg-primary">
                    <div class="card-body text-light">
                        <h1 class="text-light">{{ $jumlah_pengajuan_user }}+</h1>
                        <span>Jumlah Pengajuan Pengujian</span>
                    </div>
                </div>
            </div>
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
            <!--begin::Col-->
            <iframe width="100%" height="900" src="https://lookerstudio.google.com/embed/reporting/bb8c91bc-8ea5-4612-bf6f-779f1d9c24ac/page/p_w0xhvxfwbd" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
        <!--end::Row-->
        @endif

    </div>
    <!--end::Content container-->
</div>
@endsection


