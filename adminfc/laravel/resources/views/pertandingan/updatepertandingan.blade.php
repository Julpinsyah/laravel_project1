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
    <div class="col col-md-6">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-8 my-3">
            <form action="{{ Route('tanding.update', $tanding) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group ">
                    <label for="nama" class="form-label">Nama Liga</label>
                    <input type="text" class="form-control @error('nama') is-invalid @endError" id="nama"
                        name="nama" required autofocus value="{{ old('nama', $tanding->nama) }}">
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tanggal" class="form-label">Tanggal Pertandingan</label>
                    <input type="date" class="col-md-4 form-control @error('tanggal') is-invalid @endError"
                        id="tanggal" name="tanggal" required value="{{ old('tanggal', $tanding->tanggal) }}">
                    @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="waktu" class="form-label">Waktu Pertandingan</label>
                    <input type="time" class="col-md-4 form-control @error('waktu') is-invalid @endError" id="waktu"
                        name="waktu" required value="{{ old('waktu', $tanding->waktu) }}">
                    @error('waktu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tempat" class="form-label">Lokasi</label>
                    <input type="text" class="form-control @error('tempat') is-invalid @endError" id="tempat"
                        name="tempat" value="{{ old('tempat', $tanding->tempat) }}">
                    @error('tempat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="aktif"
                        name="aktif">
                        <option value="Y" {{ old('aktif', $tanding->aktif) == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="T" {{ old('aktif', $tanding->aktif) == 'T' ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('aktif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>




                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('tanding.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
@endsection
