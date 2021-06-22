@extends('layouts._dashboard')

@section('header', 'Edit Notifikasi')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <form method="post" action="{{route('notification.update', $notification->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control" value="{{$notification->title}}">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description">{{$notification->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-info btn-block mt-5">
                Update
            </button>
        </form>
    </div>
</div>

@endsection