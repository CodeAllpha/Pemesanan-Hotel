@extends('layouts.user-success')
@section('user-content')
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
          <img src="{{ url('frontend/images/success.png') }}" alt=""  class="mt-5"/>
          <h1>Yey Completed!</h1>
          <p>
            We will inform you via email later
            <br>
            once the transaction has been accepted
          </p>
          <a href="{{ route('landing') }}" class="btn btn-back-to-home">Back to Home</a>
        </div>
      </div>
</main>
@endsection