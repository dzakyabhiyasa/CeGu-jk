@extends('layouts._dashboard')

@section('header', 'History Masuk Gedung')

@section('content')
<form class="form-inline ml-3" action="{{ route('dashboard.scan.gedung') }}" method="GET">
    <div class="input-group input-group-sm">
        <label for="contact">Sort by Date: </label>
        <input class="form-control form-control-navbar" type="date" name="sort_date">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            @if ($sort_date !== '' && !empty($sort_date))
            <a href="{{route('dashboard.scan.gedung')}}" class="btn btn-primary w-100">clear</a>
            @endif
        </div>
    </div>
</form>
<hr>

<div class="row bg-white">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Nama Pengunjung</th>
            <th>Contact</th>
            <th>Gedung</th>
            <th>Jam Masuk</th>
            <th>Event</th>
            <th>Tanggal Event</th>
        </tr>
        @foreach($scanners as $scanner)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $scanner->visitor->name }}</td>
            <td>{{ $scanner->visitor->contact }}</td>
            <td>{{ $scanner->booking->room->building->name }}</td>
            <td>{{ $scanner->building_in }}</td>
            <td>{{ $scanner->booking->description }}</td>
            <td>{{ $scanner->booking->date }}</td>
        </tr>
        @endforeach
    </table>

</div>

@endsection