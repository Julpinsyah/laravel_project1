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
            <form
                action="{{ auth()->user()->username != $user->username ? Route('adminupdate', $user) : Route('admin.update', $user) }}"
                method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input type="hidden" name="gbr_lama" value="{{ $user->gambar }}">
                <input type="hidden" name="useradmin" value="{{ $useradmin }}">
                <input type="hidden" name="oldemail" value="{{ $user->email }}">
                <div class="mb-3 form-group ">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @endError" id="name"
                        name="name" autofocus value="{{ old('name', $user->name) }}"
                        {{ auth()->user()->username != $user->username ? 'disabled' : '' }}>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-group ">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @endError" id="username"
                        name="username" required value="{{ old('username', $user->username) }}"
                        {{ auth()->user()->username != $user->username ? 'disabled' : '' }}>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3 form-group ">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @endError" id="email"
                        name="email" required value="{{ old('email', $user->email) }}"
                        {{ auth()->user()->username != $user->username ? 'disabled' : '' }}>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                    @if ($user->role == 'superadmin')
                        <div class="mb-3 form-group ">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control col-md-4 @error('role') is-invalid @endError" id="role"
                                name="role" disabled="disabled">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Administrator</option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                                </option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-group ">
                            <label for="aktif" class="form-label">Aktif</label>
                            <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="aktif"
                                name="aktif" disabled="disabled">
                                <option value="Y" {{ $user->aktif == 'Y' ? 'selected' : '' }}>Ya</option>
                                <option value="T" {{ $user->aktif == 'T' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('aktif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @else
                        <div class="mb-3 form-group ">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control col-md-4 @error('role') is-invalid @endError" id="role"
                                name="role">
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                    Administrator</option>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User
                                </option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3 form-group ">
                            <label for="aktif" class="form-label">Aktif</label>
                            <select class="form-control col-md-4 @error('aktif') is-invalid @endError" id="aktif"
                                name="aktif">
                                <option value="Y" {{ $user->aktif == 'Y' ? 'selected' : '' }}>Ya</option>
                                <option value="T" {{ $user->aktif == 'T' ? 'selected' : '' }}>Tidak</option>
                            </select>
                            @error('aktif')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @endif
                @endif

                <div class=" form-group">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input class="form-control form-control-user p-1 @error('gambar') is-invalid @endError" type="file"
                        id="gambar" name="gambar" onchange="imgPreview()"
                        {{ auth()->user()->username != $user->username ? 'disabled' : '' }}>
                    @error('gambar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if ($user->gambar)
                        <img class="img-fluid img-preview col-md-8 mt-3"
                            src="{{ asset('public/images/admin/' . $user->gambar) }}">
                    @else
                        <img class="img-fluid img-preview col-md-8">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                @if ($useradmin != '')
                    <a href="{{ Route('useradmin') }}" class="btn btn-secondary">Kembali</a>
                @else
                    <a href="{{ Route('admin.index') }}" class="btn btn-secondary">Kembali</a>
                @endif
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
    <script type="text/javascript">
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function imgPreview() {
            const imgPreview = document.getElementsByClassName("img-preview");
            imgPreview[0].classList.add("mt-3");
            imgPreview[0].style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview[0].src = oFREvent.target.result;
            };
        }
    </script>
@endsection
