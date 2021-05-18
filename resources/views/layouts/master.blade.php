<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="antialiased bg-light">
    @include('includes.navbar')
    <div class="pointer top-button justify-content-center align-items-center" onclick="topFunction()" id="top-button"><i class="fas fa-chevron-up"></i></div>
        @yield('content')
    @include('includes.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
