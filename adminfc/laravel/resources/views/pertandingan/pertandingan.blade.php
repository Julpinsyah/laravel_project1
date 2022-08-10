@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('tanding.create') }}" class="btn btn-primary">Tambah Kelompok Pertandingan</a>
        </div>
    </div>

    <div class="row">
        <div class="col col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="table-responsive-md">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Liga</th>
                            <th scope="col">Tangal Pertandingan</th>
                            <th scope="col">Waktu Pertandingan</th>
                            <th scope="col">Tempat</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $tanding->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($tanding as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->nama }}</td>
                                <td>{{ $bn->tanggal }}</td>
                                <td>{{ $bn->waktu }}</td>
                                <td>{{ $bn->tempat }}</td>
                                <td style="min-width:150px">
                                    <a href="{{ Route('tanding.edit', $bn) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post" action="{{ Route('tanding.destroy', $bn) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $tanding->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('ckscript')
@endSection
