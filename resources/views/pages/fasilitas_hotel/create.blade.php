@extends('layouts.main')

@section('title')
  Fasilitas Hotel Create
@endsection


@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Fasilitas Hotel</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('fasilitas.index') }}">Fasilitas Hotel</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
        <x-form-create :action="route('fasilitas.store')" :upload="true">
         <div class="row">
             <div class="col-md-6">
            <x-input label="Nama Fasilitas Hotel" name="nama_fasilitas_hotel" placeholder="Masukan Nama Fasilitas Hotel"/>
             </div>
            <div class="col-md-6">
            <x-input label="Foto Fasilitas Hotel" name="foto_fasilitas_hotel" type="file" keterangan="Foto Bertipe : png. jpg. jpeg" placeholder="Masukan Foto Faslitas Hotel"/>
            </div>
           <div class="col-12" style="margin-top: -20px">
            <x-textarea label="Deskripsi Kamar" name="deskripsi_fasilitas_hotel" type="text" placeholder="Masukan Deksripsi Fasilitas"/>
           </div>
         </div>
        </x-form-create>    
<!-- Striped rows end -->
      </div>
</div>
@endsection