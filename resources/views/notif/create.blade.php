@extends('layouts._dashboard')

@section('header', 'Tambah Notifikasi')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <form method="post" action="{{route('notification.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Judul</label>
                <input name="title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-info btn-block mt-5">
                Tambah
            </button>
        </form>
    </div>
</div>

@endsection