@extends('layouts.mainlayout')

@section('cdnckeditor')
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
            <form action="{{ Route('latihan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="nama" class="form-label">Nama Latihan</label>
                    <input type="text" class="form-control @error('nama') is-invalid @endError" id="nama"
                        name="nama" required autofocus value="{{ old('nama') }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="hari" class="form-label">Hari</label>
                    <select class="form-control col-md-4 @error('hari') is-invalid @endError" id="hari" name="hari">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                    @error('hari')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="waktu_mulai" class="form-label">Jam Mulai</label>
                    <input type="time" class="col-md-4 form-control @error('waktu_mulai') is-invalid @endError"
                        id="waktu_mulai" name="waktu_mulai" required value="{{ old('waktu_mulai') }}">
                    @error('waktu_mulai')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="waktu_selesai" class="form-label">Jam Selesai</label>
                    <input type="time" class="col-md-4 form-control @error('waktu_selesai') is-invalid @endError"
                        id="waktu_selesai" name="waktu_selesai" required value="{{ old('waktu_selesai') }}">
                    @error('waktu_selesai')
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
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @endError" id="lokasi"
                        name="lokasi" value="{{ old('lokasi') }}">
                    @error('lokasi')
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
@endsection
