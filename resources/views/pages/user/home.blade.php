@extends('layouts.user')


@section('user-content')
<main>

        <!-- Header Section -->
        <header class="text-center">
            <h1>Booking The Rooms
            <br>
            As Easy One Click
            </h1>
            <p class="mt-3">You Will get beautiful
            <br>
            moment you never see before
        </p>
        <a href="{{ route('room') }}" class="btn btn-get-started px-4 mt-4">
            Reserve Now
        </a>
        </header>


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> --}}



    <!-- Booking -->
   <div class="container">
    <section class="booking-content">
        <div class="col-lg-12">
         <div method="" action="" class="row bg-white booking-stat py-3 px-1 booking border 
            shadow" style="border-radius: 5px;">
               <div class="col-lg-3 mt-1 mb-1">
                   <div class="input-group">
                    <input type="text" class="form-control rounded" maxlength="30" placeholder="Guest Name"  name="nama_tamu" value="{{ request()->search }}">
                   </div>
               </div>
               <div class="col-lg-3 mt-1 mb-1">
                <x-select-kamar-home label="Kamar" name="kamar" :select-option="$kamar"/>
               </div>
               <div class="col-lg-2 mt-1 mb-1">
                   <div class="input-group">
                       <input type="text" class="form-control" onfocus="(this.type='date')" placeholder="Check In" id="date" name="tanggal_checkin">
                   </div>
               </div>
               <div class="col-lg-2 mt-1 mb-1">
                   <div class="input-group">
                       <input type="text" class="form-control" onfocus="(this.type='date')" placeholder="Check Out" id="date" name="tanggal_checkout">
                   </div>
               </div>
               <div class="col-md-2 mt-1 mb-1">
                   <button type="" class="btn btn-block btn-booking" data-toggle="modal" data-target="#exampleModal">Check In Now</button>

               
                  
               </div>
            </div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganyu Hotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Sorry, this feature is currently under repair...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
       </div>
      </section>
   </div>


    <!-- Section Heading Kamar -->
    <section class="section-kamar" id="kamar">
       <div class="container">
           <div class="row">
               <div class="col text-center section-kamar-heading">
                   <h2>Our Offers</h2>
                   <p>We offer a comfortable room for you 
                       <br>
                     
                   </p>
               </div>
           </div>
       </div>
    </section>

    <!-- Section Content Kamar -->
    <section class="section-kamar-content" id="content">
        <div class="container">
            <div class="section-kamar-populer row justify-content-center">
                <?php $count = 0; ?>
                @foreach ($kamar as $items)
                <?php if($count == 4)break;?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-kamar shadow text-center d-flex flex-column"
                    style="background-image: url('{{ $items->foto_kamar }}');">
                     <div class="hotel-name">Ganyu Hotel</div>
                     <div class="room-name">{{ $items->nama_kamar }}</div>
                     <div class="kamar-button mt-auto">
                         <a href="{{ route('room.detail',['kamar'=>$items->id]) }}" class="btn btn-kamar-details px-4">
                             View Details
                         </a>
                     </div>
                    </div>
                  </div>
                <?php $count++;?>
                @endforeach
                 
            </div>
        </div>
    </section>



    <!-- Section Network -->
    <section class="section-network" id="fasilitashotel">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                   <h2>Hotel Facilities</h2> 
                   <p>Lorem ipsum dolor sit amet
                       <br>
                       consectetur adipisicing.
                   </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Fasilitas -->
   
    <section class="section-fasilitas" id="fasilitas">
        <div class="container">
          <div class="row justify-content-center">
            <?php $count = 0; ?>
            @foreach ($fasilitas as $items)
            <?php if($count == 3)break;?>
              <div class="col-md-4">
               <div class="card shadow">
                   <div class="inner">
                      <img src="{{ $items->foto_fasilitas_hotel }}" class="card-img-top" alt="...">
                   </div>
                   <div class="card-body text-center">
                     <h5 class="card-title">{{ $items->nama_fasilitas_hotel }}</h5>
                     <p class="card-text">{{ $items->deskripsi_fasilitas_hotel }}</p>
                  <div class="fasilitas-button">
                      <a href="{{ route('facilities') }}" class="btn btn-fasilitas">Read More</a>
                  </div>
                   </div>
                 </div>
              </div>
              <?php $count++;?>
              @endforeach
          </div>
        </div>
       </section>
    
   




    <!-- Section Testimonial Heading -->
    <section class="section-testimonial-heading" id="testimonialheading">
       <div class="container">
           <div class="row">
               <div class="col text-center">
                   <h2>They Are Loving Us</h2>
                   <p>Lorem ipsum dolor sit amet consectetur 
                       <br>
                       adipisicing elit.</p>
               </div>
           </div>
       </div>
    </section>

    <!-- Section Testimonial Content -->
    <div class="section section-testimonial-content" id="testimonial">
       <div class="container">
           <div class="section-popular-kamar row justify-content-center">
               <div class="col-sm-6 col-md col-lg-4">
                   <div class="card shadow card-testimonial text-center">
                       <div class="testimonial-content">
                           <img src="{{ asset('frontend/images/icons1.png') }}" alt="" class="mb-4 rounded-circle">
                           <h3 class="mb-4">Mark</h3>
                           <p class="testimonial">
                              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, repellendus!
                           </p>
                       </div>
                       <hr>
                       <p class="rest-in mt-2">
                           Luxurious Rooms
                       </p>
                   </div>
               </div>
               <div class="col-sm-6 col-md col-lg-4">
                   <div class="card shadow card-testimonial text-center">
                       <div class="testimonial-content">
                           <img src="{{ asset('frontend/images/icons2.png') }}" alt="" class="mb-4 rounded-circle">
                           <h3 class="mb-4">Jack</h3>
                           <p class="testimonial">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, mollitia?
                           </p>
                       </div>
                       <hr>
                       <p class="rest-in mt-2">
                           Eternal Rooms
                       </p>
                   </div>
               </div>
               <div class="col-sm-6 col-md col-lg-4">
                   <div class="card shadow card-testimonial text-center">
                       <div class="testimonial-content">
                           <img src="{{ asset('frontend/images/icons3.png') }}" alt="" class="mb-4 rounded-circle">
                           <h3 class="mb-4">Anastasya</h3>
                           <p class="testimonial">
                           Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas, illo.
                           </p>
                       </div>
                       <hr>
                       <p class="rest-in mt-2">
                           Superior Rooms
                       </p>
                   </div>
                   
               </div>
           </div>
           <div class="row">
               <div class="col-12 text-center">
                   <a href="{{ route('contact') }}" class="btn shadow btn-need-help px-4 mt-4 mx-1">
                       I Need Help
                   </a>
                   <a href="{{ route('landing') }}" class="btn shadow btn-get-started px-4 mt-4 mx-1">
                       Get Started
                   </a>
               </div>
           </div>
       </div>
    </div>
</main>
@endsection