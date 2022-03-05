@extends('layouts.app')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
      </div>
      <div class="row match-height">
          <div class="col-12">
              <div class="">
                  <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
              </div>
          </div>
      </div>
      <!-- Chart -->
      <!-- eCommerce statistic -->
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-12">
            <div class="card pull-up ecom-card-1 bg-white">
                <div class="card-content ecom-card2 height-150">
                    <h5 class="text-muted dark position-absolute p-1">Admin</h5>
                    <div>
                        <i class="ft-users dark font-large-1 float-right p-1"></i>
                    </div>
                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                      <div class="card-body">
                          <h4 class="card-title text-muted dark">{{ $admin->jumlah_admin }}</h4>
                          <h6 class="card-subtitle text-muted">Jumlah Admin</h6>
                      </div>
                     
                  </div>
                </div>
                
            </div>
        </div>
          <div class="col-xl-4 col-lg-6 col-md-12">
              <div class="card pull-up ecom-card-1 bg-white">
                  <div class="card-content ecom-card2 height-150">
                      <h5 class="text-muted danger position-absolute p-1">Kamar</h5>
                      <div>
                          <i class="la la-hotel danger font-large-1 float-right p-1"></i>
                      </div>
                      <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                        <div class="card-body">
                            <h4 class="card-title text-muted danger">{{ $kamar->jumlah_kamar }}</h4>
                            <h6 class="card-subtitle text-muted">Jumlah Kamar</h6>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-4 col-lg-12">
            <div class="card pull-up ecom-card-1 bg-white">
                <div class="card-content ecom-card2 height-150">
                    <h5 class="text-muted success position-absolute p-1">Fasilitas Kamar</h5>
                    <div>
                        <i class="la la-television success font-large-1 float-right p-1"></i>
                    </div>
                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                      <div class="card-body">
                          <h4 class="card-title text-muted success">{{ $fasilitas_kamar->jumlah_fasilitas_kamar }}</h4>
                          <h6 class="card-subtitle text-muted">Jumlah Fasilitas Kamar</h6>
                      </div>
                    </div>
                </div>
            </div>
        </div>
          <div class="col-xl-4 col-lg-6 col-md-12">
              <div class="card pull-up ecom-card-1 bg-white">
                  <div class="card-content ecom-card2 height-150">
                      <h5 class="text-muted primary position-absolute p-1">Fasilitas Hotel</h5>
                      <div>
                          <i class="la la-folder primary font-large-1 float-right p-1"></i>
                      </div>
                      <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                        <div class="card-body">
                            <h4 class="card-title text-muted primary">{{ $fasilitas_hotel->jumlah_fasilitas_hotel }}</h4>
                            <h6 class="card-subtitle text-muted">Jumlah Fasilitas Hotel</h6>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
        
          <div class="col-xl-4 col-lg-12">
            <div class="card pull-up ecom-card-1 bg-white">
                <div class="card-content ecom-card2 height-150">
                    <h5 class="text-muted info position-absolute p-1">Permintaan</h5>
                    <div>
                        <i class="la la-edit info font-large-1 float-right p-1"></i>
                    </div>
                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                      <div class="card-body">
                          <h4 class="card-title text-muted info">{{ $pemesanan->jum_permintaan }}</h4>
                          <h6 class="card-subtitle text-muted">Jumlah Permintaan</h6>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-12">
            <div class="card pull-up ecom-card-1 bg-white">
                <div class="card-content ecom-card2 height-150">
                    <h5 class="text-muted warning position-absolute p-1">Check IN</h5>
                    <div>
                        <i class="la la-bookmark warning font-large-1 float-right p-1"></i>
                    </div>
                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                      <div class="card-body">
                          <h4 class="card-title text-muted warning">{{ $pemesanan->checkin }}</h4>
                          <h6 class="card-subtitle text-muted">Jumlah Check IN</h6>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!--/ eCommerce statistic -->
      
      <!-- Statistics -->

      <!--/ Statistics -->
              </div>
            </div>
          </div>
          <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection