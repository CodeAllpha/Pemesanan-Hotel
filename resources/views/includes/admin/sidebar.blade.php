<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="theme-assets/images/backgrounds/02.jpg">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">       
        <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('dashboard') }}"><img class="brand-logo" alt="Chameleon admin logo" src="{{ url('backend/Dashboard Template/theme-assets/images/logo/icon-logo.png') }}"/> 
          <h2 class="brand-text dark">Ganyu Hotel</h2></a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <x-nav-item label="Dashboard" icon="la la-home" :link="route('dashboard')"/>
        @can('level','admin')
        <x-nav-item label="Admin" icon="ft-users" :link="route('admin.index')"/>
        @endcan
      
       <x-nav-item label="Kamar" icon="la la-hotel" :link="route('kamar.index')"/>
       <x-nav-item label="Fasilitas Hotel" icon="la la-folder" :link="route('fasilitas.index')"/>
       <x-nav-item label="Pemesanan" icon="la la-money" :link="route('pemesanan.index')"/>
     
       
     
      </ul>
    </div>
    <div class="navigation-background"></div>
  </div>