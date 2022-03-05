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
        <form method="POST" action="{{ route('login') }}">
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
                <input id="password" type="password" class="form-control item @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
            </div>

            <div class="row mb-3">
                <div class="col-md-5 ml-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
         <p class="text-center">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-dark">Forget Password ?</a>
        @endif
         </p >
        </form>
        <div class="social-media" style="margin-top: -50px">
            <span>Don't Have Account? <a href="{{ route('register') }}" class="text-dark">Sign Up</a></span>
        </div>
    </div>
    <script src="{{ url('frontend/libraries/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ url('frontend/libraries/retina/retina.min.js') }}"></script>
    <script src="{{ asset('frontend/auth/assets/js/script.js') }}"></script>
</body>
</html>
