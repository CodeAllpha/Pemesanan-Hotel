<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ganyu Hotel Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/auth/assets/css/style.css') }}">
</head>
<body>
    <div class="registration-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-icon">
                <a href="{{route('landing')}}" class="home"><i class="icon icon-user"></i></a>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" id="name" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="email" class="form-control item  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="numeric" class="form-control item  @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" id="phone_number" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item  @error('password') is-invalid @enderror" name="password" autocomplete="new-password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password-confirm" name="password_confirmation" placeholder="Password Confirmation" autocomplete="new-password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Register</button>
            </div>
        </form>
        <div class="social-media" style="margin-top: -40px">
            <span>Already Have Account? <a href="{{ route('login') }}" class="text-dark">Sign In</a></span>
        </div>
    </div>
    <script src="{{ url('frontend/libraries/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('frontend/libraries/retina/retina.min.js') }}"></script>
    <script src="{{ asset('frontend/auth/assets/js/script.js') }}"></script>
</body>
</html>
