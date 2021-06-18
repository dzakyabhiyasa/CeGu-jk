@extends('layouts._dashboard')

@section('header', 'Detail Notifikasi')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="form-group">
            <label for="title">Judul</label>
            <input name="title" type="text" class="form-control" value="{{$notification->title}}" disabled>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description" disabled>{{$notification->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Waktu</label>
            <input name="title" type="text" class="form-control" value="{{$notification->created_at}}" disabled>
        </div>
    </div>
</div>

@endsection