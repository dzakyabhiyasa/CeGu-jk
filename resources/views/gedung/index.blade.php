@extends('layouts._dashboard')

@section('header', 'Data Gedung')

@section('content')
<a class="btn btn-primary btn-sm" title="Tambah" href="{{ route('gedung.create') }}">
    Tambah
</a>
<hr>
<div class="row bg-white">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>
        @foreach($buildings as $building)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $building->name }}</td>
            <td>{{ $building->address }}</td>
            <td>{{ $building->contact }}</td>
            <td>
                <form action="{{ route('gedung.destroy',$building->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" title="Detail" href="{{ route('gedung.show', $building->id) }}">
                        Detail
                    </a>
                    <a class="btn btn-secondary btn-sm" title="Edit" href="{{ route('gedung.edit', $building->id) }}">
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