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
                        <form class="row mt-3" method="POST" action="{{ route('kelola_parameter_uji.update', $data_edit->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <div class="form-group col-md-12">
                                <label class="">Pilih Jenis Pengujian:</label>
                                <select class="form-select" data-control="select2" name="id_jenis" id="">
                                    @foreach($data_jenis_Pengujian as $data_jenis)
                                    <option value="{{ $data_jenis->id }}" @if($data_jenis->id == $data_edit->id_jenis) selected @endif>{{ $data_jenis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Nama</label>
                                <div class="">
                                    <input value="{{ $data_edit->nama }}" type="text" name="nama" class="form-control form-control-normal" placeholder="Nama...">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Tarif</label>
                                <div class="">
                                    <input type="number" value="{{ $data_edit->tarif }}" name="tarif" class="form-control form-control-normal" placeholder="Tarif...">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Satuan</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->satuan }}" name="satuan" class="form-control form-control-normal" placeholder="Satuan...">
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="">Kode SNI</label>
                                <div class="">
                                    <input type="text" value="{{ $data_edit->kode_sni }}" name="kode_sni" class="form-control form-control-normal" placeholder="Kode SNI...">
                                </div>
                            </div>

                            <script src="https://cdn.tiny.cloud/1/ltswtbla0em8qkup9a7gva2zibb2qy6hbfnq4mgf778q8swq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

                            <div class="form-group col-md-12">
                                <label class="">Deskripsi</label>
                                <div class="">
                                    <textarea name="deskripsi" class="form-control form-control-normal" placeholder="Deskripsi">{!! $data_edit->deskripsi !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="">
                                    <button type="submit" class="btn btn-primary"><i class="far fa-save" style="margin-right: 8px;"></i> Simpan </button>
                                </div>
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

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'advlist autolink link image lists charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking table contextmenu directionality emoticons paste textcolor responsivefilemanager code',

        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",

        toolbar2: "responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",

        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function() {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    cb(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },
    });
</script>

@endsection