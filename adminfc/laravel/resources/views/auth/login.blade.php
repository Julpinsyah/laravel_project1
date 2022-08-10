@extends('layouts.authlayout')
@section('main')
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-5 col-md-5">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="post" action="{{ Route('login.auth') }}">
                                    @csrf
                                    @if (session()->has('success'))
                                        <div class="alert alert-info rounded-pill" role="alert">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif

                                    @error('loginfailed')
                                        <div class="alert alert-danger rounded-pill" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('username') is-invalid @endError"
                                            id="username" name="username" placeholder="Username"
                                            value="{{ old('username') }}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control form-control-user @error('username') is-invalid @endError"
                                            id="password" name="password" placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>

                                </form>
                                <hr>
                                {{-- <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div> --}}
                                <div class="text-center">
                                    <a class="small" href="{{ Route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
