@extends('layouts.user')

@section('user-content')
<main>
    <section class="section-network">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                   <h2>Our Facilities</h2> 
                   <p>Lorem ipsum dolor sit amet
                       <br>
                       consectetur adipisicing.
                   </p>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="fasilitas-hotel">

        <div class="container">
            <div class="card">
                <div class="img8x">
                    <img src="frontend/images/kolam.jpg" alt="">
                </div>
                <div class="content">
                    <h2>Swiming Pool</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo itaque eaque odit! Dignissimos rem harum repellat cumque iure cupiditate numquam, ipsam qui ullam a consectetur ea atque aliquid quas. Sapiente?</p>
                </div>
            </div>
            <div class="card">
                <div class="img8x">
                    <img src="frontend/images/restaurant.jpg" alt="">
                </div>
                <div class="content">
                    <h2>Swiming Pool</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo itaque eaque odit! Dignissimos rem harum repellat cumque iure cupiditate numquam, ipsam qui ullam a consectetur ea atque aliquid quas. Sapiente?</p>
                </div>
            </div>
            <div class="card">
                <div class="img8x">
                    <img src="frontend/images/cafe.jpg" alt="">
                </div>
                <div class="content">
                    <h2>Swiming Pool</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo itaque eaque odit! Dignissimos rem harum repellat cumque iure cupiditate numquam, ipsam qui ullam a consectetur ea atque aliquid quas. Sapiente?</p>
                </div>
            </div>
            <div class="card">
                <div class="img8x">
                    <img src="frontend/images/restaurant.jpg" alt="">
                </div>
                <div class="content">
                    <h2>Swiming Pool</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo itaque eaque odit! Dignissimos rem harum repellat cumque iure cupiditate numquam, ipsam qui ullam a consectetur ea atque aliquid quas. Sapiente?</p>
                </div>
            </div>
            <div class="card">
                <div class="img8x">
                    <img src="frontend/images/kolam.jpg" alt="">
                </div>
                <div class="content">
                    <h2>Swiming Pool</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo itaque eaque odit! Dignissimos rem harum repellat cumque iure cupiditate numquam, ipsam qui ullam a consectetur ea atque aliquid quas. Sapiente?</p>
                </div>
            </div>
            <div class="card">
                <div class="img8x">
                    <img src="frontend/images/kolam.jpg" alt="">
                </div>
                <div class="content">
                    <h2>Swiming Pool</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo itaque eaque odit! Dignissimos rem harum repellat cumque iure cupiditate numquam, ipsam qui ullam a consectetur ea atque aliquid quas. Sapiente?</p>
                </div>
            </div>
            
        </div>
    </section> -->

    <section class="section-fasilitas">
        <div class="container">
          <div class="row justify-content-center">
             @foreach ($fasilitas as $items)
             <div class="col-md-4 mb-5">
                <div class="card shadow">
                    <div class="inner">
                       <img src="{{ $items->foto_fasilitas_hotel }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body text-center">
                      <h5 class="card-title">{{ $items->nama_fasilitas_hotel }}</h5>
                      <p class="card-text">{{ $items->deskripsi_fasilitas_hotel }}</p>
                   <div class="fasilitas-button">
                      
                   </div>
                    </div>
                  </div>
               </div>
             @endforeach
          </div>
        </div>
       </section>
</main>
@endsection