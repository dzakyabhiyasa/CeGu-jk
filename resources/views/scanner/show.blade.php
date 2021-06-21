@extends('layouts._app')

@section('title')
Detail Scan Pengunjung
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">
@endsection

@section('header')
Detail Scan Pengunjung
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-6">
        <div class="form-group">
            <label for="permission_rapid">Surat Rapid: </label>
            <a target="_blank" href="{{asset('storage/'.substr($scanner->permission_rapid,7))}}">Link</a>
        </div>
        <div class="form-group">
            <label for="body_temperature">Suhu</label>
            <input name="body_temperature" type="text" class="form-control" value="{{$scanner->body_temperature}}" disabled>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label for="face_mask">Memakai Masker</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="face_mask" value="1" disabled @if ($scanner->face_mask == 1) checked @endif>
                        <label class="form-check-label" for="face_mask">
                            Iya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="face_mask" value="0" disabled @if ($scanner->face_mask == 0) checked @endif>
                        <label class="form-check-label" for="face_mask">
                            Tidak
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label for="contact">Mencuci tangan</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="washing_hands" value="1" disabled @if ($scanner->washing_hands == 1) checked @endif>
                        <label class="form-check-label" for="washing_hands">
                            Iya
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="washing_hands" value="0" disabled @if ($scanner->washing_hands == 0) checked @endif>
                        <label class="form-check-label" for="washing_hands">
                            Tidak
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="building_in">Waktu masuk gedung</label>
            <input name="building_in" type="text" class="form-control" value="{{$scanner->building_in}}" disabled>
        </div>
        <div class="form-group">
            <label for="room_in">Waktu masuk ruangan</label>
            <input name="room_in" type="text" class="form-control" value="{{$scanner->room_in}}" disabled>
        </div>
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