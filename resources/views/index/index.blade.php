@extends('layouts._app')

@section('title')
Pesan gedung dan ruangan sesuai kebutuhan anda
@endsection

@section('css')

@endsection

@section('header')
Pilihlah Gedung yang Anda Inginkan
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-4">
        <select name="filter" class="form-control">
            <option value="populer">Populer</option>
            <option value="newest">Terbaru</option>
            <option value="cheapest">Harga Terendah</option>
            <option value="expensive">Harga Tertinggi</option>
        </select>
    </div>
    <div class="col-6 col-lg-4 offset-lg-4">
        <form action="{{ route('index') }}" method="get" class="input-group">
            <input type="text" name="title" class="form-control" placeholder="Cari ..." aria-label="Cari ..." aria-describedby="basic-addon1" value="{{ request()->query('title') }}">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">
                    <i class="ti-search"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<hr>

<div class="row">
    @foreach($buildings as $building)
    <div class="col-12 col-lg-4 col-md-6">
        <div class="card">
            @if($building->images->count() > 0)
            <img class="card-img-top img-responsive" src="{{ Storage::url($building->images[0]->image) }}" alt="Card image cap">
            @else
            <img class="card-img-top img-responsive" src="assets/images/big/img1.jpg" alt="Card image cap">
            @endif
            <div class="card-body">
                <div class="text-center">
                    <h4 class="card-title">{{ $building->name }}</h4>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="mb-0 font-weight-bold">Alamat :</p>
                    <p class="mb-0">{{ $building->address }}</p>
                </div>
                <div class="d-flex mb-2">
                    <div class="mr-2 font-weight-bold align-items-center">
                        <p class="mb-0">Jumlah Ruangan</p>
                    </div>
                    <div class="ml-auto align-items-center">
                        <span class="badge badge-pill badge-warning">{{ $building->rooms->count() }}</span>
                    </div>
                </div>
                <!-- <div class="d-flex mb-2">
                    <div class="mr-2 font-weight-bold align-items-center">
                        <p class="mb-0">Jumlah Terpakai</p>
                    </div>
                    <div class="ml-auto align-items-center">
                        <span class="badge badge-pill badge-danger">5</span>
                    </div>
                </div> -->
                <hr>
                <a href="{{ route('detail', $building->id) }}" class="btn btn-info btn-block">
                    Cek Ruangan
                </a>
            </div>
        </div>
    </div>
    @endforeach

</div>

<div class="row">
    <div class="mx-auto">
        {{ $buildings->links('pagination::bootstrap-4') }}
    </div>
</div>


@endsection

@section('js')
@endsection