@extends('layouts._dashboard')

@section('header', 'Detail Data Ruangan')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <div class="form-group">
            <label for="building">Gedung</label>
            <input name="building" type="text" class="form-control" value="{{$room->building->name}}" disabled>
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input name="name" type="text" class="form-control" value="{{$room->name}}" disabled>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description" disabled>{{$room->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="contact">Kontak</label>
            <input name="contact" type="number" class="form-control" value="{{$room->capacity}}" disabled>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h1>Photo</h1><hr>
    </div>
    
    @foreach($room->images as $image)
        <div class="col-12 col-lg-6 mx-auto my-1">
            @if (substr($image->image,0,7) == 'public/')
                <img src="{{asset('storage/'.substr($image->image,7))}}" width="400">    
            @else
                <img src="{{asset('storage/'.$image->image)}}" width="400">
            @endif
        </div>
    @endforeach
    
</div>

@endsection