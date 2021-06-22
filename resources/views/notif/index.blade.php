@extends('layouts._dashboard')

@section('header', 'List Notifikasi')

@section('content')
<a class="btn btn-primary btn-sm" title="Tambah" href="{{ route('notification.create') }}">
    Tambah
</a>
<hr>
<div class="row bg-white">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Waktu</th>
            <th>Action</th>
        </tr>
        @foreach($notifications as $notification)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $notification->title }}</td>
            <td>{{ $notification->description }}</td>
            <td>{{ $notification->created_at }}</td>
            <td>
                <form action="{{ route('notification.destroy',$notification->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" title="Detail" href="{{ route('notification.show', $notification->id) }}">
                        Detail
                    </a>
                    <a class="btn btn-secondary btn-sm" title="Edit" href="{{ route('notification.edit', $notification->id) }}">
                        Edit
                    </a>
    
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</div>

@endsection