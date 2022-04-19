 <!-- Navbar Section -->
 <div class="container-fluid">
    <nav class="navbar row navbar-expand-lg navbar-light ">
        <a href="{{ route('landing') }}" class="navbar-brand navbar-home">
            <img src="{{ url('frontend/images/logo.png') }}" alt="Logo Beta Hotel">
        </a>
        <button class="navbar-toggler navbar-toggler-right"
        type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav ml-auto mr-3">
                <x-nav-item-user label="Home" :link="route('landing')"/>
                <x-nav-item-wild label="Rooms" :link="route('room')"/>
                <x-nav-item-wild label="Facilities" :link="route('facilities')"/>
            <li class="nav-item mx-md-2">
                <a href="#testimonialheading" class="nav-link">Testimonial</a>
            </li>
            <x-nav-item-wild label="Contact Us" :link="route('contact')"/>

             

            </ul>
            @guest
                   <!-- Mobile Button -->
                   <form action="" class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Sign IN
                    </button>
                </form>

                <!-- Dekstop Button -->
                <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
                        Sign In
                    </button>
                </form>
            @endguest

            @auth
                  <!-- Mobile Button -->
            <form class="form-inline d-sm-block d-md-none" 
            action="{{ url('logout') }}" method="post">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                    Sign Out
                </button>
            </form>
   
            <!-- Dekstop Button -->
            <form class="form-inline my-2 my-lg-0 d-none d-md-block" 
            action="{{ url('logout') }}" method="post">
                @csrf
                <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                    Sign Out
                </button>
            </form>
            @endauth

        </div>
    </nav>
</div>