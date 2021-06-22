@extends('layouts._dashboard')

@section('header', 'Edit Data Ruangan')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <form method="post" action="{{route('ruangan.update', $room->id)}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Gedung</label>
                <select name="building_id" class="form-control" required>
                    <option value="">Pilih Gedung</option>
                    @foreach($buildings as $building)
                        <option value="{{$building->id}}" @if ($building->id == $room->building_id) selected @endif>{{$building->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control" value="{{$room->name}}">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description">{{$room->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="capacity">Kontak</label>
                <input name="capacity" type="number" class="form-control" value="{{$room->capacity}}">
            </div>
            <button type="submit" class="btn btn-info btn-block mt-5">
                Update
            </button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-5">
        <h1>Photo</h1>
        <hr>
        <form class="form-inline ml-3" action="{{ route('image-room.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="input-group input-group-sm">
                <label for="contact">Add photo: </label>
                <input class="form-control form-control-navbar" type="file" name="image">
                <div class="input-group-append">
                    <button class="btn btn-primary w-100" type="submit">
                        Add
                    </button>
                </div>
                &nbsp;
                <input type="hidden" name="room_id" value="{{$room->id}}">
            </div>
        </form>
    </div>
    
    @foreach($room->images as $image)
        <div class="col-12 col-lg-6 mx-auto my-1">
            @if (substr($image->image,0,7) == 'public/')
                <img src="{{asset('storage/'.substr($image->image,7))}}" width="400">    
            @else
                <img src="{{asset('storage/'.$image->image)}}" width="400">
            @endif
            <form action="{{ route('image-room.destroy',$image->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="room_id" value="{{$room->id}}">
                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                    Delete
                </button>
            </form>
        </div>
    @endforeach
    
</div>

@endsection