<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">
    <!-- Site Title-->
    <title>RWKU</title>
    <meta name="description" content="A Template for Architectural Interior Design company website.">
    <!-- Bootstrap CSS file-->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> 
    <!-- Flickity CSS file-->
    <link href="{{ asset('assets/css/flickity.min.css')}}" rel="stylesheet">
    <!-- Main CSS file-->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- Fontawesome 5 CSS file-->
    <link href="{{ asset('assets/css/fontawesome-all.min.css')}}" rel="stylesheet">
    <!-- Magnific Popup CSS-->
    <link href="{{ asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Google Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&amp;display=swap">
  </head>


  @include('components.navbar-template')


    @yield('main')

