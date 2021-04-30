@extends('layouts._app')

@section('title')
Pesan gedung dan ruangan sesuai kebutuhan anda
@endsection

@section('css')

@endsection

@section('header')
Pilihlah Gedung yang Anda Inginkan
@endsection

@section('content')
<div class="row">
    <div class="col-6 col-lg-4">
        <select name="filter" class="form-control">
            <option value="populer">Populer</option>
            <option value="newest">Terbaru</option>
            <option value="cheapest">Harga Terendah</option>
            <option value="expensive">Harga Tertinggi</option>
        </select>
    </div>
    <div class="col-6 col-lg-4 offset-lg-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari ..." aria-label="Cari ..." aria-describedby="basic-addon1">
            <div class="input-group-append">
                <button class="btn btn-info" type="button">
                    <i class="ti-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    @for ($i = 0; $i < 6; $i++)
    <div class="col-12 col-lg-4 col-md-6">
        <div class="card">
            <img class="card-img-top img-responsive" src="assets/images/big/img1.jpg" alt="Card image cap">
            <div class="card-body">
                <div class="text-center">
                    <h4 class="card-title">[NAMA GEDUNG YANG PANJANG BANGET]</h4>
                </div>
                <hr>
                <div class="mb-2">
                    <p class="mb-0 font-weight-bold">Alamat :</p>
                    <p class="mb-0">[Alamat yang panjangnya mungkin 2 baris. lumayan panjang sih tapi ini cuma display doang]</p>
                </div>
                <div class="d-flex mb-2">
                    <div class="mr-2 font-weight-bold align-items-center">
                        <p class="mb-0">Jumlah Ruangan</p>
                    </div>
                    <div class="ml-auto align-items-center">
                        <span class="badge badge-pill badge-warning">20</span>
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <div class="mr-2 font-weight-bold align-items-center">
                        <p class="mb-0">Jumlah Terpakai</p>
                    </div>
                    <div class="ml-auto align-items-center">
                        <span class="badge badge-pill badge-danger">5</span>
                    </div>
                </div>
                <hr>
                <a href="{{ route('detail') }}" class="btn btn-info btn-block">
                    Cek Ruangan
                </a>
            </div>
        </div>
    </div>
    @endfor
</div>
<div class="row justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">1</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
            <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
            <li class="page-item">
                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

@endsection

@section('js')
@endsection
