@extends('layouts._app')

@section('title')
History Transaksi
@endsection

@section('css')

@endsection

@section('header')
History Transaksi
@endsection

@section('content')

<div class="row">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Ruangan</th>
            <th>Tanggal</th>
            <th>Deskripsi</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $booking->room->name }}</td>
            <td>{{ $booking->date }}</td>
            <td>{{ $booking->description }}</td>
            <td>{{ $booking->status }}</td>
            <td>
                @if ($booking->status == 'accept')
                    <form action="{{ route('visitor.index') }}" method="GET">
                        <input type="hidden" name="bookingId" value="{{$booking->id}}" />
                        <button class="btn btn-primary w-100" type="submit">List Pengunjung</button> 
                    </form>
                @else
                    <button class="btn btn-primary w-100" disabled>List Pengunjung</button>    
                @endif               
            </td>
        </tr>
        @endforeach
    </table>

</div>

<div class="row">
    <div class="mx-auto">
        {{ $bookings->links('pagination::bootstrap-4') }}
    </div>
</div>


@endsection

@section('js')
@endsection