@extends('layouts.mainlayout')

@section('maincontent')
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
        <div class="col-lg-6">
            <div class="card mb-3 border-0 bg-transparent">
                <div class="row">
                    <div class="col-md-5 col-lg-5 mt-3">
                        <img src="{{ asset('public/images/admin/' . $user->gambar) }}" class="img-fluid rounded-start"
                            alt="..." style=" object-fit:cover">
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <div class="card-text mb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-transparent pl-0">{{ $user->username }}</li>
                                    <li class="list-group-item bg-transparent pl-0">{{ $user->email }}</li>
                                    <li class="list-group-item bg-transparent pl-0">{{ $user->role }}</li>
                                    <li class="list-group-item bg-transparent pl-0">
                                        {{ 'bergabung sejak ' . date('d - m - Y', strtotime($user->created_at)) }}
                                    </li>
                            </div>

                            <div class="card-text d-flex justify-content-end">
                                <a href="{{ Route('admin.edit', $user) }}" class="btn btn-primary mr-1">Ubah</a>
                                {{-- <form class="form d-inline" method="post" action="/manager/1">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
