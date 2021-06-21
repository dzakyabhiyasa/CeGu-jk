@extends('layouts._dashboard')

@section('header', 'Approval booking ruangan')

@section('content')

<div class="row bg-white">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Gedung</th>
            <th>Ruangan</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Deskripsi</th>
            <th>status</th>
            <th>Action</th>
        </tr>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $booking->room->building->name }}</td>
            <td>{{ $booking->room->name }}</td>
            <td>{{ $booking->date }}</td>
            <td>{{ $booking->in }}</td>
            <td>{{ $booking->out }}</td>
            <td>{{ $booking->description }}</td>
            <td>{{ $booking->status }}</td>
            <td>
                @if ($booking->status == "booking")
                    <form action="{{ route('dashboard.approve', $booking->id) }}" class="my-2" method="post">
                        @csrf
                        <button class="btn btn-primary w-100">Approve</button>
                    </form>
                    <form action="{{ route('dashboard.decline', $booking->id) }}" class="my-2" method="post">
                        @csrf
                        <button class="btn btn-danger w-100">Decline</button>
                    </form>    
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