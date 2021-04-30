@extends('layouts._app')

@section('title')
Profil Pengguna
@endsection

@section('css')

@endsection

@section('header')
Profil Pengguna
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                    <img src="https://ui-avatars.com/api/?bold=true&background=10bed2&color=ffffff&name={{ Auth::user()['name'] }}" class="rounded-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ Auth::user()['name'] }}</h4>
                </center>
            </div>
            <hr>
            <div class="card-body">
                <small class="text-muted">Alamat Email</small>
                <h6>{{ Auth::user()['email'] }}</h6>
                <small class="text-muted p-t-30 db">Nomor Handphone</small>
                <h6>+62 {{ Auth::user()['phone_number'] }}</h6>
                <small class="text-muted p-t-30 db">Alamat</small>
                <h6>{{ Auth::user()['address'] }}</h6>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">
                        Identitas Diri
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Ubah Password
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input name="name" type="text" value="{{ Auth::user()['name'] }}" type="text" class="form-control" id="nama_lengkap" aria-describedby="Nama Lengkap" placeholder="Nama Lengkap" required>
                                @error('name')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Alamat Email</label>
                                <input value="{{ Auth::user()['email'] }}" type="text" class="form-control" id="email" aria-describedby="Alamat Email" placeholder="Alamat Email" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Nomor Handphone</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                    </div>
                                    <input name="phone_number" type="number" value="{{ Auth::user()['phone_number'] }}" type="text" class="form-control" id="phone_number" aria-describedby="Nomor Handphone" placeholder="Nomor Handphone" required>
                                </div>
                                @error('phone_number')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat Lengkap</label>
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2" required>{{ Auth::user()['address'] }}</textarea>
                                @error('address')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <hr>
                            <button class="btn btn-info" type="submit">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.password') }}">
                            @csrf
                            <div class="form-group">
                                <label for="old_password">Password Lama</label>
                                <input name="old_password" type="password" class="form-control" id="old_password" aria-describedby="Password Lama" placeholder="Password Lama" required>
                                @error('old_password')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input name="password" type="password" class="form-control" id="password" aria-describedby="Password Baru" placeholder="Password Baru" required>
                                @error('password')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" aria-describedby="Konfirmasi Password" placeholder="Konfirmasi Password" required>
                                @error('password_confirmation')
                                <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <hr>
                            <button class="btn btn-info" type="submit">
                                Ubah Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
