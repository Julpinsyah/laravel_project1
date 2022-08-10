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
            <form action="{{ Route('news.update', $berita) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="gbr_lama" value="{{ $berita->gambar }}">
                <div class="mb-3 form-group ">
                    <label for="title" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control @error('title') is-invalid @endError" id="title"
                        name="title" required autofocus value="{{ old('title', $berita->judul) }}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="mb-3 form-group ">
                    <label for="kategori" class="form-label">Category</label>
                    <select class="form-control col-md-4" id="kategori">
                        <option>News</option>
                        <option>Event</option>
                        <option>Announcement</option>
                    </select>
                </div> --}}
                <div class="mb-3 form-group">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input class="form-control form-control-user p-1 @error('gambar') is-invalid @endError" type="file"
                        id="gambar" name="gambar" onchange="imgPreview()">
                    @if ($berita->gambar)
                        <img class="img-fluid img-preview col-md-8 mt-3"
                            src="{{ asset('public/images/berita/' . $berita->gambar) }}">
                    @else
                        <img class="img-fluid img-preview col-md-8">
                    @endif
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="konten" class="form-label">Isi Berita</label>
                    <input id="konten" type="hidden" name="content" value="{{ old('content', $berita->deskripsi) }}">
                    <trix-editor input="konten" class="trix-content"></trix-editor>

                </div>
                <button type="submit" class="btn btn-primary">Update</button>
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
