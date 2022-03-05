<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ganyu Hotel Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/auth/assets/css/style.css') }}">
</head>
<body>
    <div class="registration-form">
        <form method="POST" action="{{ route('password.email') }}">
            <div class="form-icon">
                <a href="{{route('landing')}}" class="home"><i class="icon icon-user"></i></a>
            </div>
            <div class="form-group">
                <input type="email"  id="email" placeholder="Email"
                class="form-control item @error('email') is-invalid @enderror" name="email" 
                value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <span>{{ $message }}</span>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Send Password Link Reset</button>
            </div>
        
        </form>
        <div class="social-media" style="margin-top: -50px">
            <span>Cancel Reset Password ? <a href="{{ route('login') }}" class="text-dark">Sign In</a></span>
        </div>
    </div>
    <script src="{{ url('frontend/libraries/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('frontend/libraries/retina/retina.min.js') }}"></script>
    <script src="{{ asset('frontend/auth/assets/js/script.js') }}"></script>
</body>
</html>
