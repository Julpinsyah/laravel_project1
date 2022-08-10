@extends('layouts.mainlayout')

@section('cdnckeditor')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}" />
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }

        .trix-content {
            min-height: 300px;
            font-size: 16px;
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
@endsection


@section('maincontent')
    <div class="row">
        <div class="col-md-8 my-3">
            <form method="post" action="{{ Route('team.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-group ">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3 form-group ">
                    <label for="kategori" class="form-label">Category</label>
                    <select class="form-control col-md-4" id="kategori" name="kategori">
                        <option>News</option>
                        <option>Event</option>
                        <option>Announcement</option>
                    </select>
                </div>
                <div class="mb-3 form-group">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control form-control-user p-1" type="file" id="formFile" name="foto_pemain">
                </div>

                <div class="mb-3 form-group">
                    <label for="konten" class="form-label">Content</label>
                    <input id="konten" value="Editor content goes here" type="hidden" name="content">
                    <trix-editor input="konten" class="trix-content"></trix-editor>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/team" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
    <script type="text/javascript">
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });
    </script>
@endsection
