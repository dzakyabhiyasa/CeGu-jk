@extends('layouts._app')

@section('title')
Edit Pengunjung
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
@endsection

@section('header')
Edit Pengunjung
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-6">
        <form method="post" action="{{route('visitor.update', $visitor->id)}}">
            @csrf 
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama</label>
                <input name="name" type="text" class="form-control" value="{{$visitor->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" value="{{$visitor->email}}">
            </div>
            <div class="form-group">
                <label for="no_id">No ID</label>
                <input name="no_id" type="text" class="form-control" value="{{$visitor->no_id}}">
            </div>
            <div class="form-group">
                <label for="contact">No Telepon</label>
                <input name="contact" type="text" class="form-control" value="{{$visitor->contact}}">
            </div>
            <input name="booking_id" type="hidden" class="form-control" value="{{$bookingId}}">
            <button type="submit" class="btn btn-info btn-block mt-5">
                Edit Pengunjung
            </button>
        </form>
    </div>
    <div class="col-12 col-lg-6 d-none d-sm-block">
        <img src="vector/permission.svg" width="100%">
    </div>
</div>
@endsection

@section('js')
<script src="assets/libs/moment/moment.js"></script>
<script src="assets/libs/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker-custom.js"></script>
<script>
    $('.date-format').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm'
    });
</script>
@endsection