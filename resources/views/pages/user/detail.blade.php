@extends('layouts.user')
@section('user-content')
<main>
    <section class="section-details-header"></section>
        <section class="section-details-kamar">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Kamar
                                </li>
                                <li class="breadcrumb-item active">
                                    Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0 mt-2">
                        <div class="card card-details">
                            <h1>{{ $kamar->nama_kamar }}</h1>
                            <p>{{ $kamar->type_kamar }}</p>
                       
                        <div class="gallery">
                            <div class="xzoom-container">
                                <img src="{{ $kamar->foto_kamar }}" alt="" class="xzoom img-fluid" id="xzoom-default" xoriginal="{{ $kamar->foto_kamar }}">
                            </div>
                            <!-- <div class="xzoom-thumbs">
                                <a href="frontend/images/header.png">
                                    <img src="frontend/images/header.png" alt="" class="xzoom-gallery" width="120" xpreview="frontend/images/header.png">
                                </a>
                                <a href="frontend/images/header.png">
                                    <img src="frontend/images/header.png" alt="" class="xzoom-gallery" width="120" xpreview="frontend/images/header.png">
                                </a>
                                <a href="frontend/images/header.png">
                                    <img src="frontend/images/header.png" alt="" class="xzoom-gallery" width="120" xpreview="frontend/images/header.png">
                                </a>
                                <a href="frontend/images/header.png">
                                    <img src="frontend/images/header.png" alt="" class="xzoom-gallery" width="120" xpreview="frontend/images/header.png">
                                </a>
                               
                            </div> -->
                        </div>
                        <h3 class="mt-4">Deskripsi Kamar</h3>
                        <p>{{ $kamar->deskripsi_kamar }}
                        </p>

                    </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                       <div class="card card-details card-right">
                           <h1 class="mb-4">Information</h1>
                           <table class="room-information ">
                          
                            <tr>
                                <th width="50%">Kasur</th>
                                <td width="50%" class="text-right">{{ $kamar->type_kasur }}</td>
                                
                            </tr>
                            <tr>
                                <th width="50%">Ukuran Kasur</th>
                                <td width="50%" class="text-right">{{ $kamar->panjang_kasur }} cm x {{ $kamar->lebar_kasur }} cm</td>
                                
                            </tr>
                            <tr>
                                <th width="50%">Luas Kamar</th>
                                <td width="50%" class="text-right">{{ $kamar->luas_kamar }} Sqm</td>
                                
                            </tr>
                      
                            <tr>
                                <th width="50%">Harga Kamar</th>
                                <td width="50%" class="text-right">Rp.{{ $kamar->harga_kamar }}</td>
                            </tr>
                        </table>
                           <hr>
                           <h3>Room Facilities</h3>
                           <table class="room-information ">
                          <ul class="list-unstyled mt-1">
                            @foreach ($fasilitas as $items)
                            <li class=""> - {{ $items->nama_fasilitas_kamar }}</li>
                            @endforeach
                             
                             
                          </ul>
                        </table>
                        </div>
                        <div class="booking-container">
                           @auth
                               <form action="{{ route('checkout',['kamar'=>$kamar->id]) }}"  >
                               <button class="btn btn-block btn-booking-now mt-3 py-2" type="submit">
                                Booking Now
                               </button>
                               </form>
                           @endauth

                            @guest
                            <a href="{{ route('login') }}" class="btn btn-block btn-booking-now mt-3 py-2">
                                Please Login First To Booking
                            </a>
                            @endguest

                        </div>
                       </div>
                
                    </div>
                </div>
            </div>
        </section>

</main>
@endsection

@push('user-css')
<link rel="stylesheet" href="{{url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('js')
<script src="{{url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
    <script>
      $(document).ready(function(){
        $('.xzoom, .xzoom-gallery').xzoom({
          zoomWidth: 500,
          title: false,
          tint: '#333',
          xoffset: 15
        });
      });
    </script>
@endpush
