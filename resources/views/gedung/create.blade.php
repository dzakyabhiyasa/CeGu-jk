@extends('layouts._dashboard')

@section('header', 'Tambah Data Gedung')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <form method="post" action="{{route('gedung.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="address">Alamat</label>
                <textarea class="form-control" name="address"></textarea>
            </div>
            <div class="form-group">
                <label for="contact">Kontak</label>
                <input name="contact" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-info btn-block mt-5">
                Tambah
            </button>
        </form>
    </div>
</div>

@endsection