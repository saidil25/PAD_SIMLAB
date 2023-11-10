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
                    <form class="row mt-3" method="POST" action="{{ route('kelola_admin.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-12 mb-10">
                            <label class="">Nama</label>
                            <div class="">
                                <input type="text" placeholder="Nama..." name="name" class="form-control form-control-normal">
                            </div>
                        </div>

                        <div class="form-group col-md-12 mb-10">
                            <label for="role">Pilih Role</label>
                            <select class="form-select" data-control="select2" id="role" name="role">
                                <option>Admin</option>
                                <option>Super Admin</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-10">
                            <label class="">Email</label>
                            <div class="">
                                <input type="email" placeholder="Email..." name="email" class="form-control form-control-normal">
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-10">
                            <label class="">No. HP (Contoh: +6281122228888)</label>
                            <div class="">
                                <input type="number" placeholder="No. HP..." name="nomor_hp" class="form-control form-control-normal">
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-10">
                            <label class="">Password</label>
                            <div class="">
                                <input type="password" placeholder="********" name="password" class="form-control form-control-normal">
                            </div>
                        </div>

                        <div class="form-group col-md-6 mb-10">
                            <label class="">Ulangi Password</label>
                            <div class="">
                                <input type="password" placeholder="********" name="password_confirmation" class="form-control form-control-normal">
                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-dark rounded-pill">
                                <i class="far fa-save" style="margin-right: 8px;"></i> Simpan
                            </button>
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