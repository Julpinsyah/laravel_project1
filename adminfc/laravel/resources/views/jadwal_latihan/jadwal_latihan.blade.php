@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('latihan.create') }}" class="btn btn-primary">Tambah Jadwal</a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Mulai</th>
                            <th scope="col">Selesai</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Link Map</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $latihan->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($latihan as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->nama }}</td>
                                <td>{{ $bn->hari }}</td>
                                <td>{{ $bn->waktu_mulai }}</td>
                                <td>{{ $bn->waktu_selesai }}</td>
                                <td>{{ $bn->lapangan }}</td>
                                <td>{{ $bn->lokasi }}</td>
                                <td style="overflow-wrap: anywhere;">{{ $bn->map }}</td>
                                <td>{{ $bn->aktif }}</td>
                                <td style="min-width:150px">
                                    <a href="{{ Route('latihan.edit', $bn) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post"
                                        action="{{ Route('latihan.destroy', $bn) }}">
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
                    {{ $latihan->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('ckscript')
@endSection
