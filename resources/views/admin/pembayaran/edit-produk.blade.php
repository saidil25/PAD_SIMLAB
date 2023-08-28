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
                        <form class="row mt-3" method="POST" action="{{ route('admin_produk_uji.update', $data_edit->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div id="module-1" class="form-group1 mt-3">
                                <label for="role">Nama Produk</label>
                                <input class="form-control" name="nama" id="nama" placeholder="Nama Prduk" value="{{ $data_edit->nama }}" required>
                            </div>

                            <div id="module-1" class="form-group1 mt-3">
                                <label for="role">No Order</label>
                                <input class="form-control" name="no_order" id="no_order" placeholder="No Order" value="@if($data_edit->no_order==null){{ '604.1/' . $data_edit->id }}@else{{ $data_edit->no_order }}@endif" required>
                            </div>

                            <div id="module-1" class="form-group1 mt-3">
                                <label for="role">Kode Sampel</label>
                                <input class="form-control" name="kode_sampel" id="kode_sampel" placeholder="Kode Sampel" value="@if($data_edit->kode_sampel==null){{ $data_edit->id . '/BB/' . date('Y', strtotime($data_edit->created_at)) }}@else{{ $data_edit->kode_sampel }}@endif" required>
                            </div>

                            <div id="module-1" class="form-group1 mt-3">
                                <label for="role">Jumlah Sampel</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah Sampel" value="{{ $data_edit->jumlah }}" required>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="far fa-save" style="margin-right: 8px;"></i> Simpan </button>
                            </div>

                        </form>
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