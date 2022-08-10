@extends('layouts.mainlayout')

@section('cdnckeditor')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}" />
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        .trix-content {
            min-height: 300px;
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
@endsection


@section('maincontent')
    <div class="row">
        <div class="col-md-8 my-3">
            <form action="{{ Route('galery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="title" class="form-label">Judul Galery</label>
                    <input type="text" class="form-control @error('judul') is-invalid @endError" id="title"
                        name="judul" required autofocus value="{{ old('judul') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="kategori" class="form-label">Urutan</label>
                    <select class="form-control col-md-4 @error('urutan') is-invalid @endError" id="urutan"
                        name="urutan">
                        @for ($i = 1; $i <= 100; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('urutan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="urutan"
                        name="aktif">
                        <option value="Y">Ya</option>
                        <option value="T">Tidak</option>
                    </select>
                    @error('aktif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input class="form-control form-control-user p-1 @error('gambar') is-invalid @endError" type="file"
                        id="gambar" name="gambar" onchange="imgPreview()">
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <img class="img-fluid img-preview col-md-8">
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('galery.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
    <script type="text/javascript">
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function imgPreview() {
            const imgPreview = document.getElementsByClassName("img-preview");
            imgPreview[0].classList.add("mt-3");
            imgPreview[0].style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview[0].src = oFREvent.target.result;
            };
        }
    </script>
@endsection
