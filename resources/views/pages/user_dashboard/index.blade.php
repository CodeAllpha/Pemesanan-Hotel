@extends('layouts.main')


@section('title')
  User
@endsection
@section('main-content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">User Account List</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">User
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
<!-- Striped rows start -->
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-header">
          </div>
          <div class="card-content collapse show">
          <x-card-table>   
                      <thead>
                          <tr>
                              <th scope="col">No</th>
                              <th scope="col">Name</th>
                              <th scope="col">Username</th>
                              <th scope="col">Email</th>
                              <th scope="col">Phone</th>
                             
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                    <?php $no = $data->firstItem();?>
                     @forelse ($data as $item)
                     <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <th scope="row">{{ $item->name }}</th>
                        <td scope="row">{{ $item->username }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row">{{ $item->phone_number }}</td>
                      
                        <td>
                         @can('level','admin')
                         <x-btn-edit :link="route('user.edit',['user'=>$item->id])"/>
                          <x-btn-delete :link="route('user.destroy',['user'=>$item->id])"/>
                         @endcan
                       
                        </td>
                    </tr> 

                     @empty
                     <tr>
                      <td colspan="5" class="text-center py-5" >
                          Data Tidak Ada
                      </td>
                      </tr>

                     @endforelse
                      </tbody>
             </x-card-table>


        <div class="d-flex justify-content-end mr-2">
            {{ $data->appends(['search' => request()->search])->links('pagination') }}
        </div>
             
          </div>
      </div>
  </div>
</div>
<!-- Striped rows end -->
      </div>
    </div>
</div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

@endsection

@section('modal')
  <x-modal-delete/>
@endsection