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
              <i class="fa fa-map-marker"></i>
              <div class="topic">Address</div>
              <div class="text-one">Purwodadi,Patimuan </div>
              <div class="text-two">Pancimas 03</div>
            </div>
            <div class="phone details">
              <i class="fa fa-phone"></i>
              <div class="topic">Phone</div>
              <div class="text-one">+62 823 2954 7489</div>
            </div>
            <div class="email details">
              <i class="fa fa-envelope"></i>
              <div class="topic">Email</div>
              <div class="text-one">ganyuhotel@gmail.com</div>
            </div>
          </div>
          <div class="right-side">
        
            <div class="topic-text">Send us a message</div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo praesentium vitae neque sint maiores autem error aspernatur, cum minus ducimus.</p>
          
            @if ($notification = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $notification }}</strong>
            </div>
            @endif
            @guest
          <form action="{{ route('contact.send') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
              <input type="text" name="name" placeholder="Enter your name">
            </div>
            <div class="input-box">
              <input type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="input-box message-box">
              <textarea name="msg" placeholder="Enter your message"></textarea>
            </div>
            <div class="button">
           <a href="{{ route('login') }}">
            <input type="button" class="btn btn-dark" value="Please Login First to Send Mail">
           </a>
            </div>
          </form>
          @endguest

          @auth
          <form action="{{ route('contact.send') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
              <input type="text" name="name" placeholder="Enter your name" value="{{ Auth::user()->name }}">
            </div>
            <div class="input-box">
              <input type="text" name="email" placeholder="Enter your email" value="{{ Auth::user()->email }}">
            </div>
            <div class="input-box message-box">
              <textarea name="msg" placeholder="Enter your message"></textarea>
            </div>
            <div class="button">
              <input type="submit" class="btn btn-dark" value="Send Mail">
            </div>
          </form>
          @endauth
        </div>
        </div>
      </div>
    </main>
@endsection