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
            <form action="{{ Route('news.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control @error('title') is-invalid @endError" id="title"
                        name="title" required autofocus value="{{ old('title') }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="mb-3 form-group ">
                    <label for="kategori" class="form-label">Category</label>
                    <select class="form-control col-md-4" id="kategori" name="kategori">
                        <option>News</option>
                        <option>Event</option>
                        <option>Announcement</option>
                    </select>
                </div> --}}
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

                <div class="mb-3 form-group">
                    <input id="konten" class="@error('content') is-invalid @endError" type="hidden" name="content"
                        value="{{ old('content') }}">
                    <label for="konten" class="form-label">Konten Berita</label>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <trix-editor input="konten" class="trix-content"></trix-editor>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('news.index') }}" class="btn btn-secondary">Kembali</a>
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
