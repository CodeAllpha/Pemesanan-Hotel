@extends('layouts.main')

@section('title')
  Kamar Show
@endsection

@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Kamar  {{ $item->nama_kamar }}</h3>
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
            <div class="col-lg-7 col-md-12">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title justify-content-center">Foto Kamar</h1>
                </div>
                  <img src="{{ $item->foto_kamar }}" id="foto_kamar" >
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <p>Deskripsi Kamar</p>
                <br>
                <p class="card-text">{{ $item->deskripsi_kamar }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title justify-content-center">Other Information</h1>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <p>Harga Kamar </p>
                    </div>
                    <div class="col">
                     <ul class="list-unstyled">
                       <li>Rp. {{number_format( $item->harga_kamar,0,'.',',')}}</li>
                     </ul>
                    </div>
                    <div class="col-md-6">
                      <p>Jumlah Kamar</p>
                    </div>
                    <div class="col">
                     <ul class="list-unstyled">
                       <li>{{ $item->jumlah_kamar }}</li>
                     </ul>
                    </div>
                    <div class="col-md-6">
                      <p>Type Kamar</p>
                    </div>
                    <div class="col">
                     <ul class="list-unstyled">
                       <li>{{ $item->type_kamar }}</li>
                     </ul>
                    </div>
                    <div class="col-md-6">
                      <p>Luas Kamar</p>
                    </div>
                    <div class="col">
                     <ul class="list-unstyled">
                       <li>{{ $item->luas_kamar }} sqm</li>
                     </ul>
                    </div>
                    <div class="col-md-6">
                      <p>Type Kasur</p>
                    </div>
                    <div class="col">
                     <ul class="list-unstyled">
                       <li>{{ $item->type_kasur }}</li>
                     </ul>
                    </div>  
                    <div class="col-md-6">
                      <p>Lebar & Panjang Kasur</p>
                    </div>
                    <div class="col">
                     <ul class="list-unstyled">
                       <li>{{ $item->panjang_kasur }} x {{ $item->lebar_kasur }} cm</li>
                     </ul>
                    </div>   
                    <div class="col-md-6">
                      <p>Fasilitas Kamar</p>
                    </div>  
                    <div class="col">
                      <ul class="list-unstyled">
                      @foreach ($fasilitas as $item)
                      <li>{{ $item->nama_fasilitas_kamar }}
                      </li>
                      @endforeach
                      </ul>
                     </div>
                  
                  </div>
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