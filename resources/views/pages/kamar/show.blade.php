@extends('layouts.main')

@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Kamar</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('kamar.index') }}">Kamar</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
    
        <section id="header-footer">
          <div class="row match-height justify-content-left">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title justify-content-center">{{ $item->nama_kamar }}</h1>
                </div>
                  <img src="{{ $item->foto_kamar }}" id="foto_kamar" >
                <div class="card-body">
                  <p class="card-text">{{ $item->deskripsi_kamar }}</p>
                  {{-- <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a> --}}
                  <br>
                  <br>

                  <p class="card-text float-right">Jumlah Kamar 
                  <br> <br> {{ $item->jumlah_kamar }}</p>

                  <p class="card-text float-left">Harga Kamar <br> <br>
                  Rp. {{number_format( $item->harga_kamar,2,'.',',')}}</p>

                </div>
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                  <span class="float-right">
                    <a href="{{ route('kamar.index') }}" class="card-link">Kembali
                      <i class="la la-angle-right"></i>
                    </a>
                  </span>
                </div>
              </div>
            </div>
            
          </div>
        </section>
     
<!-- Striped rows end -->
      </div>
</div>
@endsection