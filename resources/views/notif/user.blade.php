@extends('layouts._app')

@section('title')
Notifikasi
@endsection

@section('css')

@endsection

@section('header')
Notifikasi
@endsection

@section('content')

<div class="row">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Waktu</th>
        </tr>
        @foreach($notifications as $notification)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $notification->title }}</td>
            <td>{{ $notification->description }}</td>
            <td>{{ $notification->created_at }}</td>
        </tr>
        @endforeach
    </table>

</div>

@endsection

@section('js')
@endsection