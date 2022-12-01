<!DOCTYPE html>
<html lang="en">

<!-- font-family: 'Assistant', sans-serif;
font-family: 'Playfair Display', serif; -->
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title')</title>
@stack('prepend-style')
<link rel="stylesheet" href="{{ asset('frontend/libraries/bootstrap/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/style/main.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Assistant:wght@300;400;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
    rel="stylesheet">
@stack('addon-style')
</head>

<body>
    <!-- navbar -->
    @include('frontend.inc.nav')
    <!-- end navbar -->

    <!-- header -->

    <!-- end header -->

    <!-- main -->
    @yield('content')
    <!-- main -->

    <!-- footer -->
    @include('frontend.inc.footer')

    <!-- end footer -->
    @stack('prepend-script')
    <script src="{{ asset('frontend/libraries/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>

    @stack('addon-script')
</body>

</html>
