@extends('layouts.main')

@section('title')
  Pemesanan
@endsection


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
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Pemesanan
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
                <x-btn-create :link="route('pemesanan.create')"/>
                </h4>
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-2"></i></a>
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
                      <thead >
                          <tr>
                              <th>No</th>
                              <th>Nama Tamu</th>
                              <th>Kamar</th>
                              <th>Check In</th>
                              <th>Check Out</th>
                              <th>Status</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    <?php $no = $data->firstItem();?>
                     @forelse ($data as $item)
                     <tr class="">
                        <th>{{ $no++ }}</th>
                        <th>{{ucwords( $item->nama_tamu) }}</th>
                        <th>{{ucwords( $item->nama_kamar) }}</th>
                        <th>{{ $item->tanggal_checkin }}</th>
                        <th>{{ $item->tanggal_checkout }}</th>
                     
                        <th class="text-dark">{{ucwords( $item->status) }}</th>
                        <td>
                          {{-- <a href="{{ route('kamar.fasilitas.index',['kamar'=>$item->id]) }}"
                           class="mr-1"><i class="la la-television"></i>
                          </a> --}}
                          <x-btn-show :link="route('pemesanan.show',['pemesanan'=>$item->id])"/>
                            @can('level','admin')
                            <x-btn-delete :link="route('pemesanan.destroy',['pemesanan'=>$item->id])"/> 
                            @endcan
                        
                       
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


        <div class="d-flex justify-content-end mr-2">
            {{ $data->appends(['search' => request()->search])->links('pagination') }}
        </div>
             
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