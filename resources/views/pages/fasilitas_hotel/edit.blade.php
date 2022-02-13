@extends('layouts.main')


@section('title')
  Fasilitas Hotel Edit
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
                <li class="breadcrumb-item active"><a href="{{ route('kamar.index') }}">Fasilitas Hotel</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

  <x-form-edit :action="route('fasilitas.update',['fasilita'=>$item->id])" :upload="true">
    <div class="row">
        <div class="col-md-6">
        <x-input label="Nama Fasilitas Hotel" name="nama_fasilitas_hotel" placeholder="Masukan Nama Fasilitas" :value="$item->nama_fasilitas_hotel"/>
        <x-textarea label="Deskripsi Fasilitas Hotel" name="deskripsi_fasilitas_hotel" type="text" placeholder="Masukan Deskripsi Fasilitas" :value="$item->deskripsi_fasilitas_hotel"/>   
        {{-- <x-input label="Foto fasilitas_hotel" name="foto_fasilitas_hotel" type="file" 
        keterangan="Foto Bertipe : png. jpg. jpeg" placeholder="Masukan Foto Fasilitas"/> --}}
        <label for="nama_fasiltas_hotel">Foto Fasilitas Hotel</label>
        <input class="form-control mb-2" id="image"  type="file" name="foto_fasilitas_hotel" onchange="previewImage()">
        </div>
     
        <div class="col-md-6">
        <img src="{{ asset('assets/hotel/'.$item->foto_fasilitas_hotel) }}" id="foto_fasilitas_hotel" class="img-fluid" style="margin-top:25px">
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
