@extends('layouts._app')

@section('title')
Pesan gedung dan ruangan sesuai kebutuhan anda
@endsection

@section('css')

@endsection

@section('content')

<div class="row jumbotron mb-3" style="background-color: #A5FFCE;">
    <div class="col-sm-6">
        <h1 class="display-6">Akses Gedung dan ruangan untuk kegiatan mu sekarang juga</h1>
        <p>Ayo Gabung Sekarang</p>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button" style="background-color: #17A2B8 !important;">Daftar</a>
    </div>
    <div class="col-sm-6">
        <img src="{{ asset('img/landing1.png') }}" alt="landing 1" class="shadow-md" style="border-radius: 30px;">
    </div>
</div>

<div class="row jumbotron mb-3" style="background-color: #A5FFCE;">
    <div class="col-sm-6">
        <img src="{{ asset('img/landing2.png') }}" alt="landing 2" class="shadow-md" style="border-radius: 30px;">
    </div>
    <div class="col-sm-6 text-right">
        <h1 class="display-6">Privasi dan Kemanan adalah Tanggung jawab utama</h1>
        <p>Kami akan membantu kamu untuk menemukan ruangan dan gedung mana yang tersedia secara aman dan nyaman</p>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button" style="background-color: #17A2B8 !important;">Login</a>
    </div>
</div>

@endsection

@section('js')
@endsection