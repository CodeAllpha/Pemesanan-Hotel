<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ganyu Hotel Verify Email</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/auth/assets/css/style.css') }}">
</head>
<body>
    <div class="container" style="margin-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-radius: 10px">
                    <div class="card-header">{{ __('Thanks For Register in our Hotel') }}</div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        {{ __('You are logged in!') }}
                        <a href="{{ route('landing') }}">Clik Here To Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ url('frontend/libraries/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('frontend/libraries/retina/retina.min.js') }}"></script>
    <script src="{{ asset('frontend/auth/assets/js/script.js') }}"></script>
</body>
</html>
