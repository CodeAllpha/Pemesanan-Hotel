@extends('layouts.main')

@section('title')
  Pemesanan Create
@endsection


@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Buat Reservasi Baru</h3>
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
        <x-form-create :action="route('pemesanan.store')">
         <div class="row">
             <div class="col-md-6">
              <x-input label="Nama Tamu" name="nama_tamu" type="text" placeholder="Masukan Nama Tamu"/>
            <x-input label="Alamat Email" name="email_pemesan" type="text" placeholder="Masukan Email Pemesan"/>
             </div>
            <div class="col-md-6">
        
            <x-input label="Nama Pemesan" name="nama_pemesan" placeholder="Masukan Nama Pemesan"/>
            <x-input label="Nomor Handphone" name="no_hp" type="text" placeholder="Masukan Nomor Handphone"/>   
            </div>
            <div class="col-md-6">
            <x-input label="Check IN" name="tanggal_checkin" type="date" placeholder="Masukan Tanggal Checkin"/>
            <x-select-kamar label="Kamar" name="kamar" :select-option="$kamar"/>
            </div>
            <div class="col-md-6">
            <x-input label="Check OUT" name="tanggal_checkout" type="date" placeholder="Masukan Tanggal Checkout"/>
            <x-input label="Jumlah Kamar" name="jum_kamar_dipesan" type="text" placeholder="Masukan Jumlah Kamar"/>   
            </div>
         </div>
        </x-form-create>    
<!-- Striped rows end -->
      </div>
</div>
@endsection