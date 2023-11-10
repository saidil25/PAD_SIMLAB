@extends('layouts.main')
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
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
                        <form class="row mt-3" method="POST" action="{{ route('kelola_jenis_pengujian.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama...">
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>

                            <div class="form-group col-md-5 text-center">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="image-container">
                                            
                                            <img id="gambar" src="" alt="">
                                        </div>
                                        <input id="file-input" type="file" name="gambar" class="form-control-file mt-2" style="display: none;">
                                        <button type="button" onclick="document.getElementById('file-input').click();" class="btn btn-dark rounded-pill d-block mx-auto mt-2">
                                            Pilih Gambar
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <script>
                                document.getElementById('file-input').addEventListener('change', function () {
                                    readURL(this);
                                });

                                function readURL(input) {
                                    if (input.files && input.files[0]) {
                                        var reader = new FileReader();
                                        reader.onload = function (e) {
                                            document.getElementById('gambar').src = e.target.result;
                                        };
                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                            
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-dark rounded-pill">
                                    <i class="far fa-save" style="margin-right: 8px;"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.tiny.cloud/1/ltswtbla0em8qkup9a7gva2zibb2qy6hbfnq4mgf778q8swq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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
