@extends('layouts._app')

@section('title')
List Pengunjung
@endsection

@section('css')

@endsection

@section('header')
List Pengunjung <a class="btn btn-primary" href="{{route('visitor.create', ['bookingId' => $bookingId])}}" role="button"><i class="fa fa-plus" style="color: white;"></i></a>
@endsection

@section('content')

<div class="row">
    <table class="table w-100">
        <tr>
            <th>No</th>
            <th>Code Visitor</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>status</th>
            <th>Action</th>
            <th>Share</th>
        </tr>
        @foreach($visitors as $visitor)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $visitor->no_id }}</td>
            <td>{{ $visitor->name }}</td>
            <td>{{ $visitor->email }}</td>
            <td>{{ $visitor->contact }}</td>
            <td>
                <form action="{{ route('visitor.destroy',$visitor->id) }}" method="POST">
                    <a class="btn btn-primary btn-sm" title="Edit" href="{{ route('visitor.edit', [$visitor->id, 'bookingId' => $bookingId]) }}">
                        Edit
                    </a>
    
                    @csrf
                    @method('DELETE')
                    <input name="bookingId" type="hidden" class="form-control" value="{{$bookingId}}">
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                        Delete
                    </button>
                </form>
            </td>
            <td><a class="btn btn-primary btn-sm" target="_blank" href="https://api.whatsapp.com/send?phone={{$visitor->contact}}&text=Dear{{$visitor->name}}%2C%20Anda%20telah%20diundang%20untuk%20datang%20pada%20Event%3A{{$visitor->booking->description}}%20%7C%20Tanggal%3A{{$visitor->booking->date}}%20%7C%20Jam%20{{$visitor->booking->in}}%20%7C%20%20Nama%20Gedung%3A{{$visitor->booking->room->building->name}}%20%7C%20Ruangan%3A%20{{$visitor->booking->room->name}}%20%7C%20Kode%20visitor%3A%20*{{$visitor->no_id}}*%20%7C%20Diharapkan%20untuk%20hadir%20tepat%20waktu%2C%20Terima%20kasih%20atas%20perhatian%20Anda.">
                Share
                </a>
            </td>
        </tr>
        @endforeach
    </table>

</div>


@endsection

@section('js')
@endsection