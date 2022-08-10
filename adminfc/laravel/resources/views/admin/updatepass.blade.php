@extends('layouts.mainlayout')


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
            <form action="{{ Route('updatepass', $user) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="input-group mb-3">
                    <input type="password" class="col-md-4 form-control @error('password') is-invalid @endError"
                        name="password" placeholder="Password Baru">
                    <div class="input-group-append">
                        <button class="btn btn-outline-transparent" type="button" id="pass"
                            onclick="lihatpass(this)"><i class="fas fa-fw fa-eye"></i></button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="col-md-4 form-control @error('repassword') is-invalid @endError"
                        name="repassword" placeholder="konfirmasi Password">
                    <div class="input-group-append">
                        <button class="btn btn-outline-transparent" type="button" id="repass"
                            onclick="lihatpass(this)"><i class="fas fa-fw fa-eye"></i></button>
                    </div>
                    @error('repassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                {{-- <a href="{{ Route('admin.index') }}" class="btn btn-secondary">Kembali</a> --}}
            </form>
        </div>
    </div>
@endsection

@section('ckscript')
    <script type="text/javascript">
        function lihatpass(e) {
            // console.log(e.parentElement.parentElement.children[0]);
            // $this.parent().find('#pass').attr('type', 'text');
            if (e.parentElement.parentElement.children[0].type == 'password') {
                e.parentElement.parentElement.children[0].type = 'text';
            } else {
                e.parentElement.parentElement.children[0].type = 'password';
            }
        }
    </script>
@endsection
