@extends('layouts.user')
@section('user-content')
<main>
        
    <section class="room-search">
        <div class="container justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('search') }}" method="GET" class="row bg-white booking-stat py-3 booking shadow" style="border-radius: 10px">
                <div class="col-lg-10 mt-1 mb-2">
                    <div class="input-group">
                        <input type="text" class="form-control" maxlength="30" placeholder="Search Room Information in Here..." id="search" name="search" value="{{ request()->search }}" style="border-radius: 10px">
                    </div>
                </div>
               

                <div class="col-md-2 mt-1 mb-1">
                    <button type="submit" class="btn btn-block btn-search" style="border-radius: 10px">Search</button>
                </div>
            </form>
        </div>
       </div>
      </section>


      <section class="section-kamar-post">
        <div class="container">
            @forelse ($kamar as $kamar)
            <div class="card mt-5 shadow">
                <div class="card-header room">
                  <div class="row">
                   <div class="col-md-7">
                     {{ $kamar->nama_kamar }}
                   </div>
                   <div class="col-md-5">Room Information</div>
                  </div>
            </div>
            <div class="card-body">
               <div class="row">
                   <div class="col-md-4 mt-1">
                       <img src="{{ $kamar->foto_kamar }}" alt="" class="img-fluid">
                   </div>
                   <div class="col-md-8 mt-1">
                       <div class="card shadow">
                           <div class="card-header detail">
                               Detail
                           </div>
                           <div class="card-body">
                             <div class="row">
                                 <table class="table my-table">
                                     <thead>
                                         <tr>
                                             <th>Room Capacity</th>
                                             <th>Room Size</th>
                                             <th>Bed Type</th>
                                             <th>Price</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td>{{ $kamar->kapasitas }} People</td>
                                             <td>
                                                  {{ $kamar->panjang_kasur }} cm x 
                                                  {{ $kamar->lebar_kasur }} cm
                                            </td>
                                             <td>{{ $kamar->tipe_kasur }}</td>
                                             <td class="price">Rp {{ $kamar->harga_kamar }} / Night</td>
                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                        
                           </div>
                           <div class="card-footer text-right">
                             <a href="{{ route('room.detail',['kamar'=>$kamar->id]) }}" class="btn btn-get-this btn-sm">Get this room</a>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
         </div>
         @empty
       
             <div class="card-body mt-4">
                <h2 class="text-center mt-3">Data Not Found</h2>
             </div>
       
            @endforelse
        </div>
        <div class="d-flex justify-content-end mr-2">
        </div>
       </section>
</main>
@endsection