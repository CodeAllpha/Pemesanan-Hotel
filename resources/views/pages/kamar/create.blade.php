@extends('layouts.main')
@section('title')
  Kamar Create
@endsection


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
                <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Kamar</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
        <x-form-create :action="route('kamar.store')" :upload="true">
         <div class="row">
             <div class="col-md-6">
            <x-input label="Nama Kamar" name="nama_kamar" placeholder="Masukan Nama Kamar"/>
            <x-input label="Type Kamar" name="type_kamar" placeholder="Masukan Type Kamar"/> 
             </div>
            <div class="col-md-6">
            <x-input label="Jumlah Kamar" name="jumlah_kamar" type="number" placeholder="Masukan Jumlah Kamar"/>
            <x-input label="Harga Kamar" name="harga_kamar" type="number" placeholder="Masukan Harga Kamar"/>   
            </div>
            <div class="col-md-6">
            <x-input label="Luas Kamar" name="luas_kamar" type="number" placeholder="Masukan Luas Kamar"/>
              </div>
              <div class="col-md-3">
            <x-input label="Panjang Kasur" name="panjang_kasur" type="number" placeholder="Masukan Panjang Kasur"/>  
            </div>
            <div class="col-md-3">
            <x-input label="Lebar Kasur" name="lebar_kasur" type="number" placeholder="Masukan Lebar Kasur"/>  
            </div>
            <div class="col-md-6">
              <x-input label="Type Kasur" name="type_kasur"  placeholder="Masukan Type Kasur"/>
              </div>
              <div class="col-md-6">
                <x-input label="Foto Kamar" name="foto_kamar" type="file" keterangan="Foto Bertipe : png. jpg. jpeg"
                placeholder="Masukan Foto Kamar"/>  
              </div>
             
           <div class="col-12">
            <x-textarea label="Deskripsi Kamar" name="deskripsi_kamar" type="text" placeholder="Masukan Deskripsi Kamar"/>
           </div>
         </div>
        </x-form-create>    
<!-- Striped rows end -->
      </div>
</div>
@endsection