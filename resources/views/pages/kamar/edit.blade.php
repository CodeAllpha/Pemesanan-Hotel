@extends('layouts.main')

@section('title')
  Kamar Edit
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
                <li class="breadcrumb-item active"><a href="{{ route('kamar.index') }}">Kamar</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

  <x-form-edit :action="route('kamar.update',['kamar'=>$item->id])" :upload="true">
    <div class="row">
        <div class="col-md-6">
        <x-input label="Nama Kamar" name="nama_kamar" placeholder="Masukan Nama Kamar" :value="$item->nama_kamar"/>
        <x-input label="Jumlah Kamar" name="jumlah_kamar" placeholder="Masukan Jumlah Kamar" :value="$item->jumlah_kamar"/>
        <x-input label="Harga Kamar" name="harga_kamar" placeholder="Masukan Harga Kamars" :value="$item->harga_kamar"/>
        <x-textarea label="Deskripsi Kamar" name="deskripsi_kamar" type="text" placeholder="Masukan Deskripsi Kamar" :value="$item->deskripsi_kamar"/>   
        </div>
        <div class="col-md-6">
        <img src="{{ asset('assets/kamar/'.$item->foto_kamar) }}"class="img-fluid" style="margin-top:28px" >
        {{-- <x-input label="Foto Kamar"  name="foto_kamar" placeholder="Masukan Foto Kamar" type="file" 
        keterangan="Foto Bertipe : png. jpg. jpeg" id="image" onchange="previewImage()"/> --}}
        <label for="foto_kamar">Foto Kamar</label>
        <input class="form-control mb-2" id="image"  type="file" name="foto_kamar" onchange="previewImage()">
        </div>
    </div>
    </x-form-edit>  


</div>
</div>
@endsection
@push('js')
<script>
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-fluid');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(ofREvent){
      imgPreview.src = ofREvent.target.result;
    }

  }
</script>

@endpush

