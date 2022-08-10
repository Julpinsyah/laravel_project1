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
            <form action="{{ Route('pemain.update', $pemain) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="gbr_lama" value="{{ $pemain->photo }}">
                <div class="mb-3 form-group ">
                    <label for="nama" class="form-label">Nama Pemain</label>
                    <input type="text" class="form-control @error('nama') is-invalid @endError" id="title"
                        name="nama" required autofocus value="{{ old('nama', $pemain->nama) }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="nomor" class="form-label">No Punggung</label>
                    <input type="text" class="col-md-1 form-control @error('nomor') is-invalid @endError" id="nomor"
                        name="nomor" required autofocus value="{{ old('nomor', $pemain->nomor) }}" maxlength="3">
                    @error('nomor')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group">
                    <label for="posisi" class="form-label">Posisi</label>
                    <select class="col-md-4 form-control @error('posisi') is-invalid @endError" id="posisi"
                        name="posisi" required autofocus>
                        <option value="" disabled>Pilih Posisi</option>

                        @foreach ($posisi as $p)
                            <option value="{{ $p->id }}"
                                {{ old('posisi', $current_posisi) == $p->id ? 'selected' : '' }}>
                                {{ $p->kode }} - {{ $p->keterangan }}</option>
                        @endforeach
                    </select>
                    @error('posisi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="grup_tim" class="form-label">Group</label>
                    <select class="form-control col-md-4 @error('grup_tim') is-invalid @endError" id="urutan"
                        name="grup_tim">
                        <option value="Primary" {{ old('grup_tim', $pemain->grup_tim) == 'Primary' ? 'selected' : '' }}>
                            Primary</option>
                        <option value="Secondary"
                            {{ old('grup_tim', $pemain->grup_tim) == 'Secondary' ? 'selected' : '' }}>
                            Secondary</option>
                    </select>
                    @error('grup_tim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-control col-md-4 @error('kelamin') is-invalid @endError" id="urutan"
                        name="kelamin">
                        <option value="Pria" {{ old('kelamin', $pemain->kelamin) == 'Pria' ? 'selected' : '' }}>Pria
                        </option>
                        <option value="Wanita" {{ old('kelamin', $pemain->kelamin) == 'Wanita' ? 'selected' : '' }}>Wanita
                        </option>
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
                        id="title" name="tanggal_lahir" required autofocus
                        value="{{ old('tanggal_lahir', $pemain->tanggal_lahir) }}">
                    @error('tanggal_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @endError" id="title"
                        name="tempat_lahir" required autofocus value="{{ old('tempat_lahir', $pemain->tempat_lahir) }}">
                    @error('tampat_lahir')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="negara" class="form-label">Negara</label>
                    <input type="text" class="form-control @error('negara') is-invalid @endError" id="title"
                        name="negara" required autofocus value="{{ old('negara', $pemain->negara) }}">
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
                            <option value="{{ $i }}"
                                {{ old('tinggi', $pemain->tinggi) == $i ? 'selected' : '' }}>
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
                            <option value="{{ $i }}"
                                {{ old('berat', $pemain->berat) == $i ? 'selected' : '' }}>
                                {{ $i }} Kg</option>
                        @endfor
                    </select>
                    @error('berat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="bermain" class="form-label">Bermain</label>
                    <select class="form-control col-md-2 @error('bermain') is-invalid @endError" id="bermain"
                        name="bermain">
                        @for ($i = 0; $i <= 100; $i++)
                            <option value="{{ $i }}"
                                {{ old('bermain', $pemain->bermain) == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('bermain')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="kartu_kuning" class="form-label">Kartu Kuning</label>
                    <select class="form-control col-md-2 @error('kartu_kuning') is-invalid @endError" id="kartu_kuning"
                        name="kartu_kuning">
                        @for ($i = 0; $i <= 100; $i++)
                            <option value="{{ $i }}"
                                {{ old('kartu_kuning', $pemain->kartu_kuning) == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('kartu_kuning')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="kartu_merah" class="form-label">Kartu Merah</label>
                    <select class="form-control col-md-2 @error('kartu_merah') is-invalid @endError" id="kartu_merah"
                        name="kartu_merah">
                        @for ($i = 0; $i <= 100; $i++)
                            <option value="{{ $i }}"
                                {{ old('kartu_merah', $pemain->kartu_merah) == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('kartu_merah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="goal" class="form-label">Goal</label>
                    <select class="form-control col-md-2 @error('goal') is-invalid @endError" id="goal"
                        name="goal">
                        @for ($i = 0; $i <= 100; $i++)
                            <option value="{{ $i }}" {{ old('goal', $pemain->goal) == $i ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                    @error('goal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="col-md-4 form-control @error('tanggal_masuk') is-invalid @endError"
                        id="title" name="tanggal_masuk" required autofocus
                        value="{{ old('tanggal_masuk', $pemain->tanggal_masuk) }}">
                    @error('tanggal_masuk')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                    <input type="date" class="col-md-4 form-control @error('tanggal_keluar') is-invalid @endError"
                        id="title" name="tanggal_keluar"
                        value="{{ old('tanggal_keluar', $pemain->tanggal_keluar) }}">
                    @error('tanggal_keluar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-2 @error('aktif') is-invalid @endError" id="urutan"
                        name="aktif">
                        <option value="Y" {{ old('aktif', $pemain->aktif) == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="T" {{ old('aktif', $pemain->aktif) == 'T' ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('aktif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class=" form-group">
                    <label for="photo" class="form-label">Upload Gambar</label>
                    <input class="form-control form-control-user p-1 @error('photo') is-invalid @endError" type="file"
                        id="photo" name="photo" onchange="imgPreview()">
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if ($pemain->photo)
                        <img class="img-fluid img-preview col-md-8 mt-3"
                            src="{{ asset('public/images/photo/' . $pemain->photo) }}">
                    @else
                        <img class="img-fluid img-preview col-md-8">
                    @endif
                </div>

                <div class="mb-3 form-group ">
                    <label for="informasi_lain" class="form-label">Keterangan lain</label>
                    <Textarea type="text" rows="3" class="form-control @error('informasi_lain') is-invalid @endError"
                        id="informasi_lain" name="informasi_lain">{{ old('informasi_lain', $pemain->informasi_lain) }}</Textarea>
                    @error('informasi_lain')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('pemain.index') }}" class="btn btn-secondary">Kembali</a>
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
