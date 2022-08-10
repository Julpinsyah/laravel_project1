@extends('layouts.mainlayout')

@section('maincontent')
    <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('news.create') }}" class="btn btn-primary">Create News</a>
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
        <div class="col-md">
            <div class="table-responsive-md">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $berita->firstItem()  @endphp
                        @foreach ($berita as $news)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $news->judul }}</td>
                                <td style="min-width:150px">
                                    <a href="{{ Route('news.show', $news) }}" class="btn btn-outline-info btn-sm"><i
                                            class="fas fa-fw fa-eye"></i></a>
                                    <a href="{{ Route('news.edit', $news) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post" action="{{ Route('news.destroy', $news) }}">
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
                    {{ $berita->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
