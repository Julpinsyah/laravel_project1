@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('posisi.create') }}" class="btn btn-primary">Tambah Posisi</a>
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
                <table class="table table-fluid table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $posisi->firstItem()  @endphp
                        {{-- @php $i = 1 @endphp --}}
                        @foreach ($posisi as $bn)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $bn->kode }}</td>
                                <td>{{ $bn->keterangan }}</td>
                                <td style="min-width:120px">
                                    <a href="{{ Route('posisi.edit', $bn) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post" action="{{ Route('posisi.destroy', $bn) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $posisi->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection

@section('ckscript')
@endSection
