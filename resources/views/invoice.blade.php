<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('frontend/invoice/bootstrap-4.6.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/invoice/style.css') }}">

    <title>Reservasi Invoice</title>
  </head>
  <body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="" alt="" class="img-fluid">
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No.<span>{{ $data->id }}</span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Information</p>
                            <h2>Ganyu Hotels</h2>
                            <p class="address">Pancimas Street<br>RT 04/01<br>Patimuan</p>
                            <div class="txn">
                                Kabupaten Cilacap Jawa Tengah   
                            </div>
                        </div>
                        <div class="col-5">
                            <p>Booking Information</p>
                            <h2>{{ $data->nama_pemesan }}</h2>
                            <p class="address">Phone Number : {{ $data->no_hp }} <br>Email : {{ $data->email_pemesan }} <br></p>
                            {{-- <div class="txn mt-2">
                                TXN:XXXXXX
                            </div> --}}
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Guest Name :
                                <span>{{ $data->nama_tamu }}</span>
                            </p>
                            <p>
                                Created At :
                                <span>{{ date('d/m/Y H:i:s',strtotime($data->created_at)) }}</span>
                            </p>
                        </div>
                        <div class="col-5">
                            <p>Check IN:
                                <span>12-02-2022</span>
                            </p>
                            <p>Check OUT:
                                <span>12-02-2022</span>
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <img src="{{ $kamar->foto_kamar }}" class="mr-3" alt="...">
                                    <div class="media-body">
                                      <p class="mt-0 title">Nama Kamar
                                      </p>
                                      {{ $kamar->nama_kamar }}
                                    </div>
                                  </div>
                            </td>
                            <td>Rp. {{ $kamar->harga_kamar }}</td>
                            <td>{{ $data->jum_kamar_dipesan }}</td>
                            <td>Rp. {{ $data->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <footer>
                <hr>
                <p class="m-0 text-center">
                Terimakasih Telah Melakukan Reservasi di Hotel Kami
                </p>
            </footer>
        </div>
    </div>
</body>
</html>