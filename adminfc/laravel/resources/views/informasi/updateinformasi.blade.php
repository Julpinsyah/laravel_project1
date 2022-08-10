@extends('layouts.mainlayout')


@section('maincontent')
    <div class="row">
        <div class="col-md-8 my-3">
            <form action="{{ Route('informasi.update', $informasi) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group">
                    <label for="batas" class="form-label">Batas Akhir</label>
                    <input type="date" class="form-control @error('batas') is-invalid @endError col-md-4" id="batas"
                        name="batas" required value="{{ old('batas', $informasi->batas) }}">
                    @error('batas')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="aktif" class="form-label">Aktif</label>
                    <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="aktif"
                        name="aktif">
                        <option value="Y" {{ $informasi->batas == 'Y' ? 'selected' : '' }}>Ya</option>
                        <option value="T" {{ $informasi->batas == 'T' ? 'selected' : '' }}>Tidak</option>
                    </select>
                    @error('aktif')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="informasi" class="form-label">Isi Informasi</label>
                    <textarea type="text" col="3" class="form-control @error('informasi') is-invalid @endError" id="informasi"
                        name="informasi" required>{{ old('informasi', $informasi->informasi) }}</textarea>
                    @error('informasi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('informasi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
@endsection
