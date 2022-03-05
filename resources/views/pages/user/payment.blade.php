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
                                    Details
                                </li>
                                <li class="breadcrumb-item">
                                    Checkout
                                </li>
                                <li class="breadcrumb-item active">
                                    Payments
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 pl-lg-0 mt-2">
                        <div class="card card-details">
                            <h1>Booking Detail</h1>

                            <div class="payment mt-3">  
                            <div class="card-header">Your Information</div>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="col-md-4">Guest Name</td>
                                        <td class="col-md-8">{{ $pemesanan->nama_tamu }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Total Rooms</td>
                                        <td class="col-md-8">{{ $pemesanan->jum_kamar_dipesan }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Check In</td>
                                        <td class="col-md-8">{{ $pemesanan->tanggal_checkin }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Check Out</td>
                                        <td class="col-md-8">{{ $pemesanan->tanggal_checkout }}</td>
                                    </tr>
                                  
                                    <tr>
                                        <td class="col-md-4">Room Name</td>
                                        <td class="col-md-8">{{ $kamar->nama_kamar }}</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-4">Room Price</td>
                                        <td class="col-md-8">Rp.{{ $kamar->harga_kamar }}</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            </div>

                            <div class="payment mt-3">  
                                <div class="card-header">Privacy Policies</div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-4">Checkin Instruction</td>
                                            <td class="col-md-8">Reservations with manual transfer payment methods will be recorded in our system when we have confirmed payment</td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-4">Cancellation Policy</td>
                                            <td class="col-md-8">Full refund if you cancel a maximum of 2 days before the checkin date</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                                {{-- <p>By clicking the payment button means you've agreed to the terms and coditions and our privacy Policy</p> --}}
                                <!-- <div class="booking-container mt-4 ">
                                    <a href="" class="btn btn-block btn-booking-now">
                                        Continue to Payment
                                    </a>
                                </div> -->
                                <div class="card" style="background-color: rgb(245, 245, 245)">
                                    <div class="card-body">
                                      <p class="note" style="font-style: italic">By clicking the payment button means you've agreed to the terms and coditions and our privacy policy.</p>
                                    </div>
                                </div>
                                </div>
                    </div>
                    </div>
                    <div class="col-lg-4 mt-2">
                       <div class="card card-details card-right">
                           <h1>Checkout Information</h1>
                           <table class="room-information mt-2 mb-2">
                            <tr>
                                <th width="50%">Order by</th>
                                <td width="50%" class="text-right">{{ $pemesanan->nama_pemesan }}</td>
                            </tr>
                            <tr>
                                <th width="50%"></th>
                                <td width="50%" class="text-right"></td>
                            </tr>
                            <tr>
                                <th width="50%">Long Time</th>
                                <td width="50%" class="text-right">{{ $pemesanan->waktu }} Night</td>
                            </tr>
                            <tr>
                                <th width="50%">Total Price</th>
                                <td width="50%" class="text-right unique">
                                    Rp {{ $pemesanan->bayar}}
                               </td>
                            </tr>
                       
                        </table>
                           <hr>
                          
                           <h3>Payment Instruction</h3>
                           <p class="payment-instruction">
                               Please complete your payment.
                           </p>
                           <div class="bank">
                               <div class="bank-item pb-3">
                                   <img src="{{ url('frontend/images/credit.png') }}" alt="" class="bank-image">
                                   <div class="description">
                                       <h3>Ganyu Hotel</h3>
                                       <p>
                                           0882 3129 7232
                                           <br>
                                           Bank Cental Asia
                                       </p>
                                   </div>
                                   <div class="clearfix">

                                   </div>
                               </div>
                               <div class="bank-item pb-3">
                                <img src="{{ url('frontend/images/credit.png') }}" alt="" class="bank-image">
                                <div class="description">
                                    <h3>Ganyu Hotel</h3>
                                    <p>
                                        0823 2954 7489
                                        <br>
                                        Gopay
                                    </p>
                                </div>
                                <div class="clearfix">
                                    
                                </div>
                            </div>
                           </div>
                        </div>
                        <div class="booking-container">
                            <a href="{{ route('mail',['pemesanan'=>$pemesanan])}}" class="btn btn-block btn-booking-now mt-3 py-2">
                                Continue to Payment
                            </a>
                        </div>
                      
                       </div>
                
                    </div>
                </div>
            </div>
        </section>

</main>
@endsection