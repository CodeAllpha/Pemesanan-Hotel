@extends('layouts.main')


@section('title')
  Admin Create
@endsection

@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Admin</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Admin</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
     
<!-- Striped rows start -->
        <x-form-create :action="route('admin.store')">
         <div class="row">
             <div class="col-md-6">
            <x-input label="Nama Admin" name="name" placeholder="Masukan Nama Admin"/>
            <x-input label="Username" name="username" placeholder="Masukan Username"/>
             </div>
            <div class="col-md-6">
            <x-input label="Password" name="password" type="password" placeholder="Masukan Password"/>
            <x-input label="Konfirmasi Password" name="password_confirmation" type="password" placeholder="Ulangi Password"/>   
            </div>
         </div>
        </x-form-create>    
<!-- Striped rows end -->
      </div>
</div>
@endsection