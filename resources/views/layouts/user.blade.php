<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('includes.user.style')
    @stack('user-css')
    <title>Ganyu Hotel</title>
</head>
<body>
   @include('includes.user.navbar')
   @yield('user-content')
  @include('includes.user.footer')

@include('includes.user.script')
@stack('js')
</body>
</html>