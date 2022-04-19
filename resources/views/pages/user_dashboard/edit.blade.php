@extends('layouts.main')

@section('title')
  User Edit
@endsection


@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">User Account</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">User</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <x-form-edit :action="route('user.update',['user'=>$item->id])">
        <div class="row">
            <div class="col-md-6">
           <x-input label="Nama User" name="name" placeholder="Masukan Nama" :value="$item->name"/>
           <x-input label="Username" name="username" placeholder="Masukan Username" :value="$item->username"/>
            </div>
            <div class="col-md-6">
            <x-input label="Nomor Telp" name="phone_number" type="numeric" placeholder="Masukan Nomor Telphone" :value="$item->phone_number"/>
            <x-input label="Email" name="email" type="email" placeholder="Masukan Email" :value="$item->email"/>
            </div>
           <div class="col-md-6">
           <x-input label="Password" name="password" type="password" placeholder="Masukan Password"/>
           </div>
           <div class="col-md-6">
            <x-input label="Konfirmasi Password" name="password_confirmation" type="password" placeholder="Ulangi Password"/>   
            </div>
          
        </div>
       </x-form-edit>  


    </div>
</div>
@endsection