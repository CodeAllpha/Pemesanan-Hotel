@extends('layouts.user')

@section('user-content')


<main>
    <!-- Section Heading Kamar -->
    <section class="section-reservasi" id="servasi">
       <div class="container">
           <div class="row">
               <div class="col text-center section-kamar-heading">
                   <h2>Reservasi</h2>
                   <p>Lorem ipsum, dolor sit amet 
                       <br>
                       consectetur adipisicing.
                   </p>
               </div>
           </div>
       </div>
    </section>

    <!-- Section Reservasi  -->

    <section class="section-form-reservasi">
       <div class="container">
           <div class="content-body">
               <div class="row justify-content-center">
                   <div class="col-lg-10">
                       <div class="card shadow">
                           <div class="card-body">
                               <form action="">
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
                                <div class="form-group d-grid mt-3">
                                    <button type="submit" class="btn btn-reservasi btn-block py-2">
                                        Booking Sekarang
                                    </button>
                                </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </section>


</main>
@endsection