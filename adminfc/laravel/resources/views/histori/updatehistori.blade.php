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
            <form action="{{ Route('histori.update', $histori) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="gbr_lama" value="{{ $histori->gambar }}">
                <div class="mb-3 form-group ">
                    <label for="judul" class="form-label">Judul Histori</label>
                    <input type="text" class="form-control @error('judul') is-invalid @endError" id="judul"
                        name="judul" required autofocus value="{{ old('judul', $histori->judul) }}">
                    @error('judul')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="Tahun" class="form-label">Tahun</label>
                    <select class="form-control col-md-4 @error('tahun') is-invalid @endError" id="tahun"
                        name="tahun">
                        @for ($i = 1990; $i <= 2040; $i++)
                            <option value="{{ $i }}" {{ $i == $histori->tahun ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('tahun')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="aktif"
                        name="aktif">
                        <option value="Y" {{ $histori->aktif == 'Y' ? ' selected' : '' }}>Ya</option>
                        <option value="T" {{ $histori->aktif == 'T' ? ' selected' : '' }}>Tidak</option>
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
                    @if ($histori->gambar)
                        <img class="img-fluid img-preview col-md-8 mt-3"
                            src="{{ asset('public/images/histori/' . $histori->gambar) }}">
                    @else
                        <img class="img-fluid img-preview col-md-8">
                    @endif
                </div>

                <div class="mb-3 form-group">
                    <input id="keterangan" class="@error('ketrangan') is-invalid @endError" type="hidden" name="keterangan"
                        value="{{ old('keterangan', $histori->keterangan) }}">
                    <label for="konten" class="form-label">Keterangan Histori</label>
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <trix-editor input="keterangan" class="trix-content"></trix-editor>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('histori.index') }}" class="btn btn-secondary">Kembali</a>
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
