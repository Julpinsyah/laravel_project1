@extends('layouts.mainlayout')

@section('maincontent')
    {{-- {{ dd($berita) }} --}}
    <div class="row">
        <div class="col-md">
            <div class="card mb-3">
                <img src="{{ asset('public/images/berita/' . $berita->gambar) }}" class="card-img-top"
                    alt="{{ $berita->gambar }}" style="object-fit:cover; max-height:400px">
                <div class="card-body">
                    <div class="row">
                        <div class="col col-md-8">
                            <h3 class="card-title mb-0 align-items-lg-stretch">{{ $berita->judul }}</h3>
                        </div>
                        <div class="col col-md-4">
                            <div class="card-text text-right">
                                <a href="{{ Route('news.index') }}" class="btn btn-outline-secondary btn-sm border-0">&laquo
                                    Kembali</a>
                                <a href="{{ Route('news.edit', $berita) }}" class="btn btn-outline-primary btn-sm"><i
                                        class="fas fa-fw fa-edit"></i></a>
                                <form class="form d-inline" method="post" action="{{ Route('news.destroy', $berita) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <p class="card-text">
                        <small class="text-muted">Last updated
                            {{ $berita->updated_at->diffForHumans() }}
                            by Admin </small>
                    </p>
                    <p class="card-text">
                        {!! $berita->deskripsi !!}
                </div>
            </div>
        </div>
    </div>
@endsection
