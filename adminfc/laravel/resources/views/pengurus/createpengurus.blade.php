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
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-8 my-3">
            <form action="{{ Route('pengurus.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @endError" id="title"
                        name="nama" required autofocus value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="posisi" class="form-label">Posisi</label>
                    <input type="text" class="form-control @error('posisi') is-invalid @endError" id="posisi"
                        name="posisi" required value="{{ old('posisi') }}">
                    @error('posisi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control col-md-4 @error('kelamin') is-invalid @endError" id="urutan"
                        name="kelamin">
                        <option value="Pria" {{ old('kelamin') == 'Pria' ? 'selected' : '' }}>Pria</option>
                        <option value="Wanita" {{ old('kelamin') == 'Wanita' ? 'selected' : '' }}>Wanita</option>
                    </select>
                    @error('kelamin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="col-md-4 form-control @error('tanggal_lahir') is-invalid @endError"
                        id="title" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @endError" id="tempat_lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    @error('tempat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="negara" class="form-label">Negara</label>
                    <input type="text" class="form-control @error('negara') is-invalid @endError" id="negara"
                        name="negara" value="{{ old('negara') }}">
                    @error('negara')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tinggi" class="form-label">Tinggi Badan</label>
                    <select class="form-control col-md-2 @error('tinggi') is-invalid @endError" id="urutan"
                        name="tinggi">
                        @for ($i = 100; $i <= 300; $i++)
                            <option value="{{ $i }}" {{ old('tinggi') == $i ? 'selected' : '' }}>
                                {{ $i }} cm</option>
                        @endfor
                    </select>
                    @error('tinggi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="berat" class="form-label">Berat Badan</label>
                    <select class="form-control col-md-2 @error('berat') is-invalid @endError" id="urutan"
                        name="berat">
                        @for ($i = 40; $i <= 150; $i++)
                            <option value="{{ $i }}" {{ old('berat') == $i ? 'selected' : '' }}>
                                {{ $i }} Kg</option>
                        @endfor
                    </select>
                    @error('berat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="facebook" class="form-label">Link Facebook</label>
                    <input type="text" class="form-control @error('facebook') is-invalid @endError" id="facebook"
                        name="facebook" value="{{ old('facebook') }}">
                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="instagram" class="form-label">Link Instagram</label>
                    <input type="text" class="form-control @error('instagram') is-invalid @endError" id="instagram"
                        name="instagram" value="{{ old('instagram') }}">
                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-group">
                    <label for="twitter" class="form-label">Link Twitter</label>
                    <input type="text" class="form-control @error('twitter') is-invalid @endError" id="twitter"
                        name="twitter" value="{{ old('twitter') }}">
                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tanggal_masuk" class="form-label">Tanggal Bergabung</label>
                    <input type="date" class="col-md-4 form-control @error('tanggal_masuk') is-invalid @endError"
                        id="title" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-2 @error('aktif') is-invalid @endError" id="aktif"
                        name="aktif">
                        <option value="Y" {{ old('aktif') == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="T" {{ old('aktif') == 'T' ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('aktif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="urutan" class="form-label">Urutan</label>
                    <select class="form-control col-md-2 @error('urutan') is-invalid @endError" id="urutan"
                        name="urutan">
                        @for ($i = 1; $i <= 20; $i++)
                            <option value="{{ $i }}" {{ old('urutan') == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('urutan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group">
                    <label for="photo" class="form-label">Upload Gambar (ukuran gambar 370x370)</label>
                    <input class="form-control form-control-user p-1 @error('photo') is-invalid @endError" type="file"
                        id="photo" name="photo" onchange="imgPreview()">
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <img class="img-fluid img-preview col-md-8">
                </div>

                <div class="mb-3 form-group">
                    <input id="konten" class="@error('content') is-invalid @endError" type="hidden"
                        name="informasi_lain" value="{{ old('informasi_lain') }}">
                    <label for="konten" class="form-label">Keterangan Tambahan</label>
                    @error('informasi_lain')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <trix-editor input="konten" class="trix-content"></trix-editor>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('pengurus.index') }}" class="btn btn-secondary">Kembali</a>
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
            oFReader.readAsDataURL(document.getElementById("photo").files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview[0].src = oFREvent.target.result;
            };
        }
    </script>
@endsection
