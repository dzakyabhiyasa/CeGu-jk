@extends('layouts._auth')

@section('title')
Masuk
@endsection

@section('content')
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="auth-box">
        <div class="logo">
            <span class="db"><img src="img/logo-72.png" alt="logo" /></span>
            <h5 class="font-medium m-b-20 m-t-20">Masuk</h5>
        </div>

        <div class="row">
            <div class="col-12">
                <form class="form-horizontal m-t-20" id="loginform" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="ti-email"></i></span>
                        </div>
                        <input name="email" type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required autofocus>
                    </div>
                    <div class="mb-3">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                        </div>
                        <input name="password" type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="mb-3">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <a href="{{ route('password.request') }}" class="text-dark float-right">
                                    <i class="fa fa-lock m-r-5"></i>
                                    Lupa Password ?
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg btn-info" type="submit">Masuk</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0 m-t-10">
                        <div class="col-sm-12 text-center">
                            Belum memiliki akun ? <a href="{{ route('register') }}" class="text-info m-l-5"><b>Daftar</b></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
