@extends('layouts._dashboard')

@section('header', 'Data Ruangan')

@section('content')
<a class="btn btn-primary btn-sm" title="Tambah" href="{{ route('ruangan.create') }}">
    Tambah
</a>
<hr>
<div class="row bg-white">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gedung</th>
            <th>Kapasitas</th>
            <th>Action</th>
        </tr>
        @foreach($rooms as $room)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->building->name }}</td>
            <td>{{ $room->capacity }}</td>
            <td>
                <form action="{{ route('ruangan.destroy',$room->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" title="Detail" href="{{ route('ruangan.show', $room->id) }}">
                        Detail
                    </a>
                    <a class="btn btn-secondary btn-sm" title="Edit" href="{{ route('ruangan.edit', $room->id) }}">
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