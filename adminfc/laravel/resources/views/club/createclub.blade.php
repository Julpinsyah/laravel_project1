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
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <div class="row">
        <div class="col-md-8 my-3">
            <form action="{{ Route('club.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="nama" class="form-label">Nama Club</label>
                    <input type="text" class="form-control @error('nama') is-invalid @endError" id="nama"
                        name="nama" required autofocus value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tempat" class="form-label">Tempat Club</label>
                    <input type="text" class="form-control @error('tempat') is-invalid @endError" id="tempat"
                        name="tempat" required value="{{ old('tempat') }}">
                    @error('tempat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="kontak" class="form-label">HP / Telephone</label>
                    <input type="text" class="form-control @error('kontak') is-invalid @endError" id="kontak"
                        name="kontak" value="{{ old('kontak') }}">
                    @error('kontak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="manager" class="form-label">Manager</label>
                    <input type="text" class="form-control @error('manager') is-invalid @endError" id="manager"
                        name="manager" value="{{ old('manager') }}">
                    @error('manager')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="pelatih" class="form-label">Pelatih</label>
                    <input type="text" class="form-control @error('pelatih') is-invalid @endError" id="pelatih"
                        name="pelatih" value="{{ old('pelatih') }}">
                    @error('pelatih')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="lapangan" class="form-label">Lapangan</label>
                    <input type="text" class="form-control @error('lapangan') is-invalid @endError" id="lapangan"
                        name="lapangan" value="{{ old('lapangan') }}">
                    @error('lapangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="aktif"
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
                    <label for="logo" class="form-label">Upload Logo</label>
                    <input class="form-control form-control-user p-1 @error('logo') is-invalid @endError" type="file"
                        id="logo" name="logo" onchange="imgPreview()">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <img class="img-fluid img-preview col-md-8">
                </div>

                <div class="mb-3 form-group ">
                    <label for="map" class="form-label">Link Map</label>
                    <textarea type="text" rows="3" class="form-control @error('map') is-invalid @endError" id="map"
                        name="map">{{ old('map') }}</textarea>
                    @error('map')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('club.index') }}" class="btn btn-secondary">Kembali</a>
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
            oFReader.readAsDataURL(document.getElementById("logo").files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview[0].src = oFREvent.target.result;
            };
        }
    </script>
@endsection
