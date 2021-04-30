@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h3 class="text-danger">
        <i class="fa fa-exclamation-triangle"></i>
        Warning
    </h3>
    Upss ! Terjadi suatu kesahalan. Silahkan coba lagi.
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h3 class="text-danger">
        <i class="fa fa-exclamation-triangle"></i>
        Warning
    </h3>
    {!! $message !!}
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h3 class="text-success">
        <i class="fa fa-check-circle"></i>
        Sukses
    </h3>
    {!! $message !!}
</div>
@endif
