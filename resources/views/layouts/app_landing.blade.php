<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags and other head elements -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
    <title>@yield('title')</title>
    <meta name="description" content="A Template for Architectural Interior Design company website.">
    <!-- CSS files -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> 
    <link href="{{ asset('assets/css/flickity.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&amp;display=swap">
</head>
<body>
    <!-- Navbar -->
    @include('components.navbar-template')
    <!-- End Navbar -->

    <!-- Main Content -->
    @yield('main')

    <!-- Footer -->
    @include('components.footer-template')
    <!-- End Footer -->
</body>

    <!-- JavaScript files -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/lozad.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/flickity.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/global.js') }}"></script>
    
</html>
