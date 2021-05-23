@extends('layouts._app')

@section('title')
{{ $room->name }}
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
{{ $room->name }}
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="row shadow-sm rounded-lg p-5">
            <div class="col-sm-12 mb-5">
                <h1>{{ $room->building->name }}</h1>
                <p>Perizinan Ruangan {{ $room->name }}</p>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="reason">Nama Master Room</label>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="reason">Jadwal Kegiatan</label>
                    <p></p>
                </div>
                <div class="form-group">
                    <label for="reason">Deskripsi Kegiatan</label>
                    <p></p>
                </div>
                <div class="form-group">
                    <p>Kapasitas Maksimal : {{ $room->capacity }}</p>
                    <p>Jumlah Orang Saat Ini : </p>
                </div>
            </div>
            <div class="col-sm-6">
                <img src="vector/permission.svg" width="100%">
            </div>
            <div class="col-12">
                <div class="d-inline">
                    <a href="{{ route('booking.form', [$room->building->id, $room->id]) }}" class="btn btn-info">
                        Buat Izin
                    </a>
                    <a href="#" class="btn btn-danger">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <h1 class="text-center my-5">Jadwal Ruangan</h1>
        <div class="row justify-content-left mb-3">
            <div class="col-sm-3">
                <form action="{{ route('room.show', $room->id) }}" method="get">
                    <select name="order" id="order" class="form-control">
                        <option value="asc">Terlama</option>
                        <option value="desc" selected>Terbaru</option>
                    </select>
                    <button class="btn btn-info mt-2" type="submit">Filter</button>
                </form>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>Room Master</th>
                <th>Waktu</th>
                <th>Kegiatan</th>
            </tr>
            <tr>
                @foreach($bookings as $booking)
                <td>-</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->description }}</td>
                @endforeach
            </tr>
        </table>
    </div>
</div>
@endsection

@section('js')
@endsection