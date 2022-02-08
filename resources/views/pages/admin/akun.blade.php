@extends('layouts.main')

@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">My Account</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">My Account</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <x-form-edit :action="route('admin.akun')">
        <div class="row">
            <div class="col-md-6">
           <x-input label="Nama Admin" name="name" :value="$item->name"/>
           <x-input label="Username" name="username" :value="$item->username"/>
            </div>
           <div class="col-md-6">
           <x-input label="Password" name="password" type="password"/>
           <x-input label="Konfirmasi Password" name="password_confirmation" type="password"/>   
           </div>
        </div>
       </x-form-edit>  


    </div>
</div>
@endsection