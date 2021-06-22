@extends('layouts._dashboard')

@section('header', 'Tambah Data Ruangan')

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 mx-auto">
        <form method="post" action="{{route('ruangan.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Gedung</label>
                <select name="building_id" class="form-control" required>
                    <option value="">Pilih Gedung</option>
                    @foreach($buildings as $building)
                        <option value="{{$building->id}}">{{$building->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="capacity">Kapasitas</label>
                <input name="capacity" type="number" class="form-control">
            </div>
            <button type="submit" class="btn btn-info btn-block mt-5">
                Tambah
            </button>
        </form>
    </div>
</div>

@endsection