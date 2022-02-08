@extends('layouts.main')

@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Fasilitas Kamar {{ $kamar->nama_kamar }}</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('kamar.fasilitas.index',['kamar'=>$kamar->id]) }}">Fasilitas Kamar</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
        <x-form-edit :action="route('kamar.fasilitas.update',['kamar'=>$kamar->id,'fasilita'=>$data->id])" :upload="true">
            <x-input label="Nama Fasilitas Kamar" name="nama_fasilitas_kamar" :value="$data->nama_fasilitas_kamar"/>
        </x-form-edit>    
<!-- Striped rows end -->
      </div>
</div>
@endsection