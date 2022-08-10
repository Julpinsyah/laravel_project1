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
            <form action="{{ Route('pertandingan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="idtanding" class="form-label">ID Liga</label>
                    <select class="col-md-6 form-control @error('idtanding') is-invalid @endError" id="idtanding"
                        name="idtanding" required>
                        <option value="" disabled>Pilih Liga</option>
                        @foreach ($liga as $c)
                            <option value="{{ $c->id }}" {{ old('idtanding') == $c->id ? 'selected' : '' }}>
                                {{ $c->nama }} -> {{ $c->tanggal }}</option>
                        @endforeach
                    </select>
                    @error('idtanding')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <input id="tgl" type="hidden" name="tanggal" value="">
                {{-- <div class="mb-3 form-group ">
                    <label for="tanggal" class="form-label">Tanggal Pertandingan</label>
                    <input type="date" class="col-md-4 form-control @error('tanggal') is-invalid @endError"
                        id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                <div class="mb-3 form-group ">
                    <label for="waktu" class="form-label">Waktu Pertandingan</label>
                    <input type="time" class="col-md-4 form-control @error('waktu') is-invalid @endError" id="waktu"
                        name="waktu" required value="{{ old('waktu') }}">
                    @error('waktu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tanding" class="form-label">Tim Kandang</label>
                    <select class="form-control @error('tanding') is-invalid @endError" id="tanding" name="tanding"
                        required>
                        <option value="" disabled>Pilih Tim Kandang</option>
                        @foreach ($club as $c)
                            <option value="{{ $c->id }}" {{ old('tanding') == $c->id ? 'selected' : '' }}>
                                {{ $c->nama }}</option>
                        @endforeach
                    </select>
                    @error('tanding')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-3 form-group ">
                    <label for="tandang" class="form-label">Tim Tandang</label>
                    <select class="form-control @error('tandang') is-invalid @endError" id="tandang" name="tandang"
                        required>
                        <option value="" disabled>Pilih Tim Tandang</option>
                        @foreach ($club as $c)
                            <option value="{{ $c->id }}" {{ old('tandang') == $c->id ? 'selected' : '' }}>
                                {{ $c->nama }}</option>
                        @endforeach
                    </select>
                    @error('tandang')
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
                <a href="{{ Route('pertandingan.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
    <script>
        $(document).ready(function() {
            tgl = ($('#idtanding option:selected').text()).split('->');
            $('#tgl').val(tgl[1]);

            $('#idtanding').change(function() {
                // console.log($('#idtanding option:selected').text());
                tgl = ($('#idtanding option:selected').text()).split('->');
                // console.log(tgl[1]);
                $('#tgl').val(tgl[1]);
            });
        });
    </script>
@endsection
