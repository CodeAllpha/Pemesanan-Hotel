@extends('layouts.main')

@section('title')
  Fasilitas Kamar
@endsection

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
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Fasilitas Kamar
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
<!-- Striped rows start -->
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title">
                 <x-btn-create :link="route('kamar.fasilitas.create',['kamar'=>$kamar->id])"/>
                </h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                  </ul>
              </div>
          </div>
          <div class="card-content collapse show">
    <x-card-table>   
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Fasilitas Kamar</th>
                        <th scope="col">Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php $no =1;?>
                @forelse ($data as $item)
                <tr>
                <th scope="row">{{ $no++ }}</th>
                <th scope="row">{{ $item->nama_fasilitas_kamar }}</th>
                <td>
          
            <x-btn-edit :link="route('kamar.fasilitas.edit',['kamar'=>$kamar->id,'fasilita'=>$item->id])"/>
            <x-btn-delete :link="route('kamar.fasilitas.destroy',['kamar'=>$item->id,'fasilita'=>$item->id])"/> 
                
                </td>
            </tr> 

                @empty
                <tr>
                <td colspan="5" class="text-center py-5" >
                    Data Tidak Ada
                </td>
                </tr>

                @endforelse
                </tbody>
        </x-card-table>


       
             
          </div>
      </div>
  </div>
</div>
<!-- Striped rows end -->
      </div>
    </div>
</div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection

@section('modal')
  <x-modal-delete/>
@endsection