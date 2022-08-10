@extends('layouts.mainlayout')

@section('maincontent')
    {{-- <div class="row mb-3">
        <div class="col-md">
            <a href="{{ Route('news.create') }}" class="btn btn-primary">Create News</a>
        </div>
    </div> --}}

    <div class="row">
        <div class="col col-md-6">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
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
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" colspan="3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = $user->firstItem()  @endphp
                        @foreach ($user as $news)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{ $news->name }}</td>
                                <td>{{ $news->username }}</td>
                                <td>{{ $news->email }}</td>
                                <td>{{ $news->role }}</td>
                                <td>{{ $news->aktif }}</td>
                                <td style="min-width:150px">
                                    {{-- <a href="{{ Route('news.show', $news) }}" class="btn btn-outline-info btn-sm"><i
                                            class="fas fa-fw fa-eye"></i></a> --}}
                                    <a href="{{ Route('editadmin', $news) }}" class="btn btn-outline-primary btn-sm"><i
                                            class="fas fa-fw fa-edit"></i></a>
                                    <form class="form d-inline" method="post" action="{{ Route('admin.destroy', $news) }}">
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
                    {{ $user->onEachSide(3)->links() }}
                </ul>
            </nav>
        </div>
    </div>
@endsection
