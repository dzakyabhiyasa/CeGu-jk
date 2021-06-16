@extends('layouts._app')

@section('title')
Cek Code Pengunjung
@endsection

@section('css')

@endsection

@section('header')
Cek Code Pengunjung
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-lg-6">
        <form method="post" action="{{route('scanner.store')}}">
            @csrf
            <div class="form-group">
                <label for="code">Kode Visitor</label>
                <input name="code" type="text" class="form-control">
            </div>
            <input name="booking_id" type="hidden" class="form-control" value="{{$bookingId}}">
            <button type="submit" class="btn btn-info btn-block mt-5">
                Cek Kode
            </button>
            <br>
            @if ($message !== '' && !empty($message))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>        
            @endif
        </form>
    </div>
</div>


@endsection

@section('js')
@endsection