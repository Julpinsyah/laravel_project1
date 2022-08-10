@extends('layouts.mainlayout')


@section('maincontent')
    <div class="row">
        <div class="col-md-8 my-3">
            <form action="{{ Route('posisi.update', $posisi) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 form-group ">
                    <label for="kode" class="form-label">Kode Posisi</label>
                    <input type="text"class="form-control @error('kode') is-invalid @endError col-md-2" id="kode"
                        name="kode" required value="{{ old('kode', $posisi->kode) }}">
                    @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-group ">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" col="3" class="form-control @error('keterangan') is-invalid @endError"
                        id="keterangan" name="keterangan" required value="{{ old('keterangan', $posisi->keterangan) }}">
                    @error('keterangan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ Route('posisi.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
@endsection
