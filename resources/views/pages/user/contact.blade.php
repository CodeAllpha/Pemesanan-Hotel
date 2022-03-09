@extends('layouts.user')

@section('user-content')
<main>


    <section class="section-contact-us">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet
                        <br>
                        consectetur adipisicing.
                    </p>
                </div>
            </div>
        </div>
    </section>

      <div class="container contact-us">
        <div class="content">
          <div class="left-side">
            <div class="address details">
              <i class="fas fa-map-marker-alt"></i>
              <div class="topic">Address</div>
              <div class="text-one">Purwodadi,Patimuan </div>
              <div class="text-two">Pancimas 03</div>
            </div>
            <div class="phone details">
              <i class="fas fa-phone-alt"></i>
              <div class="topic">Phone</div>
              <div class="text-one">+62 823 2954 7489</div>
            </div>
            <div class="email details">
              <i class="fas fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text-one">ganyuhotel@gmail.com</div>
            </div>
          </div>
          <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo praesentium vitae neque sint maiores autem error aspernatur, cum minus ducimus.</p>
          <form action="#">
            <div class="input-box">
              <input type="text" placeholder="Enter your name">
            </div>
            <div class="input-box">
              <input type="text" placeholder="Enter your email">
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Enter your message"></textarea>
            </div>
            <div class="button">
              <input type="button" class="btn" value="Send Now">
            </div>
          </form>
        </div>
        </div>
      </div>
    </main>
@endsection