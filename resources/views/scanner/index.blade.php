@extends('layouts._app')

@section('title')
List Scanning Pengunjung
@endsection

@section('css')

@endsection

@section('header')
List Scanning Pengunjung <a class="btn btn-primary" href="{{route('scanner.scan', ['bookingId' => $bookingId])}}" role="button"><i class="fa fa-plus" style="color: white;"></i></a>
@endsection

@section('content')

<div class="row">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Nama Pengunjung</th>
            <th>Code Visior</th>
            <th>Masuk Gedung</th>
            <th>Masuk Ruangan</th>
            <th>Action</th>
        </tr>
        @foreach($scanners as $scanner)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $scanner->visitor->name }}</td>
            <td>{{ $scanner->visitor->no_id }}</td>
            <td>{{ $scanner->building_in }}</td>
            <td>{{ $scanner->room_in }}</td>
            <td>
                <form action="{{ route('scanner.destroy',$scanner->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" title="Detail" href="{{ route('scanner.show', [$scanner->id, 'bookingId' => $bookingId]) }}">
                        Detail
                    </a>
                    {{-- <a class="btn btn-primary btn-sm" title="Edit" href="{{ route('scanner.edit', [$scanner->id, 'bookingId' => $bookingId]) }}">
                        Edit
                    </a> --}}
    
                    @csrf
                    @method('DELETE')
                    <input name="bookingId" type="hidden" class="form-control" value="{{$bookingId}}">
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

@section('js')
@endsection