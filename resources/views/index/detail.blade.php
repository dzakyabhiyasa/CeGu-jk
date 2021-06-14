@extends('layouts._app')

@section('title')
{{ $building->name }}
@endsection

@section('css')
<style>
    .box-1-1 {
        position: relative;
        width: 100%;
        padding-top: 100%;
        /* 1:1 Aspect Ratio */
    }

    .content-1-1 {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        text-align: center;
    }

    .seat {
        float: left;
        display: block;
        background: #efefef;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        cursor: pointer;
    }

    .seat-select {
        display: none;
    }

    .seat-select:checked+.seat {
        background: #ef6e6e;
    }
</style>
@endsection

@section('header')
{{ $building->name }}
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-6">
        <div id="carouselExampleControls" class="carousel slide mb-3" data-ride="carousel">
            <div class="carousel-inner" role="listbox" style="border-radius: 8px;">
                @foreach($building->images as $image)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <div class="container p-0">
                        <img class="d-block img-fluid rounded" src="{{ Storage::url($image->image) }}" alt="First slide">
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <h5 class="font-weight-bold">
            Deskripsi Gedung :
        </h5>
        <p>
            {{ $building->description }}
        </p>
        <!-- <p class="mb-0">
            - Papan Tulis
        </p>
        <p class="mb-0">
            - Papan Tulis
        </p>
        <p class="mb-0">
            - Papan Tulis
        </p>
        <p class="mb-0">
            - Papan Tulis
        </p>
        <p class="mb-0">
            - Papan Tulis
        </p> -->
        <hr>
        <h5>Pilih Ruangan yang Tersedia</h5>
        <form method="post" action="{{ route('building.room') }}">
            @csrf
            <div class="row">
                @foreach($building->rooms as $room)
                <div class="col-2 mb-3">
                    <div class="box-1-1">
                        <div class="content-1-1">
                            <input id="seat-{{ $loop->iteration }}" class="seat-select" type="radio" value="{{ $room->id }}" name="seat" />
                            <label for="seat-{{ $loop->iteration }}" class="seat">
                                <div class="d-flex justify-content-center align-items-stretch" style="height: 100%;">
                                    <div class="d-flex align-items-center">
                                        {{ $loop->iteration }}
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <p class="text-info font-italic">* Sebelum memasuki gedung dan ruangan harap membuat pereizinan terlebih dahulu</p>
            <div class="row mt-2">
                <div class="col-2">
                    <a href="{{ route('index') }}" class="btn btn-outline-danger btn-block">
                        <i class="ti-arrow-left"></i>
                    </a>
                </div>
                <div class="col-10">
                    <button type="submit" class="btn btn-info btn-block">
                        Izin Memasuki Gedung
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
@endsection