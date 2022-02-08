@extends('layouts.main')

@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Pemesanan</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('kamar.index') }}">Pemesanan</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
    
<!-- Blockquotes basic-->
<section id="blockquotes-default" class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Pemesanan <small class="text-muted">( Tamu )</small></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                 <div class="row">
                     <div class="col-md-6">
                        <p>Nama Tamu </p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->nama_tamu }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Kamar </p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $kamar->nama_kamar }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Jumlah</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $kamar->jumlah_kamar }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Check In / Check Out</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->tanggal_checkin }} - {{ $pemesanan->tanggal_checkin }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Lamanya</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->waktu }} Malam </p>
                     </div>
                     <div class="col-md-6">
                        <p>Total Pembayaran</p>
                     </div>
                     <div class="col-md-6">
                        <p>Rp.{{ $pemesanan->bayar }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Status</p>
                     </div>
                     <div class="col-md-6">
                       <form action="{{ route('pemesanan.update',['pemesanan'=>$pemesanan->id]) }}" method="POST" class="form-inline">
                        @method('put')
                          <x-select name="status" :value="$pemesanan->value_status" :select-option="$option"/>
                           {{-- <button type="submit" class="btn btn-sm btn-success ml-2">Update</button> --}}
                      
                      
                     </div>
                 </div>
                 <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted mt-1">
                  <div class="form-group d-grid">
                     <button type="submit" class="btn btn-primary btn-block">
                         Simpan
                     </button>
                 </div>
                </div>
               </form>
                </div>
                  
            </div>
        </div>
    </div>



    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">List Pemesanan<small class="text-muted"> ( Pemesan ) </small></h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                        <p>Nama Pemesan</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->nama_pemesan }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Nomor Hp</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->no_hp }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Email</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->email_pemesan }}</p>
                     </div>
                     <div class="col-md-6">
                        <p>Tanggal Pesan</p>
                     </div>
                     <div class="col-md-6">
                        <p>{{ $pemesanan->tanggal_dibuat }}</p>
                     </div>
                   </div>
            
                   <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted" style="margin-top: 60px">
                     <span class="float-right">
                       <a href="{{ route('pemesanan.index') }}" class="card-link">Kembali
                         <i class="la la-angle-right"></i>
                       </a>
                     </span>
                   </div>
                </div>
             
            </div>
        </div>
    </div>
</section>
<!--/ Blockquotes basic -->

     
<!-- Striped rows end -->
      </div>
</div>
@endsection