@extends('layouts.user')
@section('user-content')
<main>
        
    <section class="room-search">
        <div class="container col-lg-10">
            <form action="/room" method="GET" class="row bg-white booking-stat py-3 px-2 booking border shadow " style="border-radius: 5px;">
                <div class="col-lg-3 mt-1 mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control rounded" maxlength="30" placeholder="Room Name" id="search" name="search" value="{{ request()->search }}">
                    </div>
                </div>
                <div class="col-lg-3 mt-1 mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control rounded" maxlength="30" placeholder="Room Type">
                    </div>
                </div>
                <div class="col-lg-2 mt-1 mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Bed Type" id="date">
                    </div>
                </div>
                <div class="col-lg-2 mt-1 mb-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Facilities" id="date">
                    </div>
                </div>
             
                <div class="col-md-2 mt-1 mb-1">
                    <button type="submit" class="btn btn-block btn-search">Search</button>
                </div>
            </form>
       </div>
      </section>

    <section class="room-table">
    <div class="container">
       <div class="row">
           @foreach ($kamar as $item)
           <table class="content-table">
            <thead class="col-12 col-lg-12 thead-room">
                <tr class="tr-room">
                    <th class="col-lg-3 th-room">{{ $item->nama_kamar }}</th>
                    <th class="col-lg-3 th-room">Room Information</th>
                </tr>
            </thead>
            <tbody class="tbody-room">
                <tr class="tr-room">
                    <td class="col-12 col-lg-4 col-md-7 td-room">
                        <img src="{{ $item->foto_kamar }}" alt="" class="img-fluid mb-2">
                        <span>Room Size: {{ $item->luas_kamar }} sqm
                            <br>
                            Bed Size: {{ $item->panjang_kasur }}cm x {{ $item->lebar_kasur }}cm
                        </span>
                    </td>
                    <td class="col-12 col-lg-8 col-md-7 td-room" >
                        <div class="card shadow">
                            <div class="card-header">Detail</div>
                            <div class="card-body">
                               <div class="room-facilities">
                                   <table class="card-content-table">
                                       <thead class="card-thead-room">
                                           <tr class="card-tr-room">
                                               <th class="card-th-room">Room Type</th>
                                               <th class="card-th-room">Facilities</th>
                                               <th class="card-th-room">Bed Type</th>
                                               <th class="card-th-room">Price</th>
                                           </tr>
                                       </thead>
                                       <tbody class="card-tbdoy-room">
                                            <tr class="card-tr-room">
                                                <td class="card-td-room">{{ $item->type_kamar }}</td>
                                                <td class="card-td-room">
                                                    <ul class="list-unstyled">
                                                    <li>Television</li>
                                                    <li>Air Conditioner</li>
                                                    </ul>
                                                </td>
                                                <td class="card-td-room">{{ $item->type_kasur }}</td>
                                                <td class="card-td-room">
                                                    <span>Rp {{ $item->harga_kamar }} / Night</span>
                                                </td>
                                            </tr>
                                       </tbody>
                                   </table>
                               </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('detail',['kamar'=>$item->id]) }}" class="btn btn-get-this btn-sm">Get this room</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
         </table>
        @endforeach
        <div class="d-flex justify-content-end mr-2">
            {{-- {{ $kamar->links() }} --}}
        </div>
         
       </div>
    </div>
   
    </section>
</main>
@endsection