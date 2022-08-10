@extends('layouts.mainlayout')

@section('maincontent')
    <a href="/team" class="btn btn-outline-secondary mb-2">
        &laquo; Kembali
    </a>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-3 border-0 bg-transparent">
                <div class="row">
                    <div class="col-md-5 col-lg-5 mt-3">
                        <img src="{{ asset('images/player/player-1.jpg') }}" class="img-fluid rounded-start" alt="..."
                            style="min-height:500px; object-fit:cover">
                    </div>
                    <div class="col-md-7 col-lg-7">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <div class="card-text mb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-transparent">An item</li>
                                    <li class="list-group-item bg-transparent">An item</li>
                                    <li class="list-group-item bg-transparent">An item</li>
                                    <li class="list-group-item bg-transparent">An item</li>
                                    <li class="list-group-item bg-transparent">An item</li>
                                    <li class="list-group-item bg-transparent">An item</li>
                                </ul>
                            </div>

                            <div class="card-text d-flex justify-content-end">
                                <a href="" class="btn btn-primary mr-1">Ubah</a>
                                <a href="" class="btn btn-danger">Hapus</a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
