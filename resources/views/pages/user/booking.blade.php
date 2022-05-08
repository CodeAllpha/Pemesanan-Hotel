@extends('layouts.user-alternate')
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
                            <a href="{{ route('room',['kamar'=>$kamar->id]) }}" class="text-dark">Room</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('room.detail',['kamar'=>$kamar->id]) }}" class="text-dark">Details</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('booking',['kamar'=>$kamar->id]) }}" class="text-dark">Booking</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        
      <div class="row">
        <div class="col-12 pl-lg-0">
            @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
           </div>
      </div>
     
     
     
        @if ($kamar->kamar_kosong > 0)
        <form action="{{ route('booking.room',['kamar'=>$kamar->id])}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-8 pl-lg-0 mt-2">
                    <div class="card card-details">
                        <h1>Your Information</h1>
                        <p class="mt-3">Please input your booking through the booking from bellow.Make sure it is field in correctly so that eases the process of booking</p>
                        <div class="row booking-input mt-3">
                        <div class="col-lg-6">
                            <x-input label="Guest Name*" name="nama_tamu" placeholder="Guest Full Name"/>
                            </div>
                            <div class="col-lg-6">
                            <x-input label="Total Room*" name="jum_kamar_dipesan" type="number" placeholder="Total Rooms you want to Booking"/>
                            </div>
                            <div class="col-lg-6">
                            <div class="form-group">
                            <x-input-date label="Check In*" name="tanggal_checkin" placeholder="Checkin date"/>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <x-input-date label="Check Out*" name="tanggal_checkout" placeholder="Checkout date"/>
                            </div>
                            <div class="col-lg-12">
                            <x-textarea label="Special Request*" type="text" name="spesial_request" placeholder="Special Request, leave blank if not avaliable"/>
                          <div class="card" style="background-color: rgb(245, 245, 245)">
                              <div class="card-body">
                                <p class="note" style="font-style: italic">Note: All special request are subject to avalibility and thus are not guaranteed.Early check-in or Airpot Transfer may incure additional charge Please contact hotel staff directly for further information.</p>
                              </div>
                          </div>
    
                            <!-- <div class="booking-container mt-4">
                                <a href="" class="btn btn-block btn-booking-now">
                                    Next Step
                                </a>
                            </div> -->
                            </div>
                            
                        
                        </div>
                </div>
                </div>
                <div class="col-lg-4 mt-2">
                    <div class="card card-details card-right">
                        <h1>Your Booking Room</h1>
                        <hr>
                        <p>Please check your booking Again</p>
                        
                        <h3>Simple Information</h3>
                        <table class="room-information mt-2 mb-2">
                        <tr>
                            <th width="50%">Rooms Name</th>
                            <td width="50%" class="text-right">{{ $kamar->nama_kamar }}</td>
                        </tr>
                        <tr>
                            <th width="50%">Rooms Avaliable</th>
                            <td width="50%" class="text-right">{{ $kamar->kamar_kosong }} Room</td>
                        </tr>
                        <tr>
                            <th width="50%">Capacity</th>
                            <td width="50%" class="text-right">{{ $kamar->kapasitas }} People</td>
                        </tr>
    
                        <tr>
                            <th width="50%">Room Price</th>
                            <td width="50%" class="text-right">Rp {{ $kamar->harga_kamar }}</td>
                        </tr>
                    
                    </table>
                    
                    </div>
                    {{-- <div class="booking-container">
                        <a href="#" class="btn btn-block btn-booking-now mt-3 py-2">
                           Next Step
                        </a>
                        
                    </div> --}}
                    <div class="booking-container">
                        <button class="btn btn-block btn-booking-now mt-3 py-2">
                            Next Step
                        </button>
                    </div>
                    
                    </div>
            
                </div>
            </div>
          </form>
        @endif
    
        @if ($kamar->kamar_kosong < 1)
            Kamar Kosong
        @endif
    </div>
</section>

</main>
@endsection