@extends('layouts.main')

@section('title')
  Fasilitas Hotel Show
@endsection


@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Fasilitas {{ $item->nama_fasilitas_hotel }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('kamar.index') }}">Fasilitas Hotel</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
    
        <section id="header-footer">
          <div class="row match-height">
            <div class="col-lg-7 col-md-12">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Foto {{ $item->nama_fasilitas_hotel }}</h1>
                </div>
                  <img src="{{ $item->foto_fasilitas_hotel }}" id="foto_kamar" >
               
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                 
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Deskripsi  {{ $item->nama_fasilitas_hotel }}</h3>
                </div>
                  
                <div class="card-body">
                  <p class="card-text">{{ $item->deskripsi_fasilitas_hotel }}</p>
                </div>
                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                  <span class="float-right">
                    <a href="{{ route('fasilitas.index') }}" class="card-link">Kembali
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