@extends('layouts.main')

@section('title')
  Pemesanan Success
@endsection


@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Success Reservasi</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('pemesanan.index') }}">Pemesanan</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
    
<div class="content-body">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Berhasil Reservasi</h2>
                <p class="text-center">Terima Kasih Telah Melakukan Resrvasi</p>
            <div class="text-center">
                <img src="{{ asset('frontend/images/success.png') }}" alt="Gambar Invoice" class="img-fluid justify-content-center height-250">
            </div>
            </div>
            <div class="card-footer">
                <h5 class="text-center">Untuk Selanjutnya Silahkan Cetak Invoice</h5>
                <br>
               <div class="text-center">
                <a href="{{ route('pemesanan.invoice',['pemesanan'=>$data->id]) }}" class="btn btn-primary btn-md">Cetak Invoice</a>
               </div>
            </div>
        </div>
    </div>
</div>
</div>
    
<!-- Striped rows end -->
      </div>
</div>
@endsection