<html>
<head>
    <title> Institute Webiste </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('page-css')
</head>
<body>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="logo">
                <img src="{{ asset('img/logo.jpg') }}" width="60" height="80">
            </div>
        </div>

        <div class="col-md-8 offset-md-1" >
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 h-100" src="{{ asset('img/slide-1.jpg') }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="{{ asset('img/slide-2.jpg') }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="{{ asset('img/slide-3.jpg') }}" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-3" id="nav">
            <a href="{{ route("dashboard") }}"> <p class="text-center mt-2"> Dashboard </p> </a>
        </div>
        @if(Auth::check())
            @if(Auth::user()->role == "teacher")
                <div class="col-md-3 " id="nav">
                    <a href="{{ route("institute.profile") }}"> <p class="text-center mt-2" > View Your Institute </p> </a>
                </div>
                @elseif(Auth::user()->role == "student")
                <div class="col-md-3 " id="nav">
                    <a href="{{ route("student.profile") }}"> <p class="text-center mt-2" > View Candidate's Institute </p> </a>
                </div>
            @endif
        @else
            <div class="col-md-3 " id="nav">
                <a href="{{ route("institute") }}"> <p class="text-center mt-2" > Login/Register Your Institute </p> </a>
            </div>
        @endif

        <div class="col-md-3 " id="nav">
            <a href="{{ route('page','partners') }}"> <p class="text-center mt-2"> Our Partners</p> </a>
        </div>
        <div class="col-md-3 " id="nav">
            <a href="{{ route('page','contact-us') }}"> <p class="text-center mt-2"> Contact Us </p> </a>
        </div>
    </div>
    @yield('content')
    <div class="row mt-3">
        <div class="col-md-10 offset-md-1" >
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 " src="{{ asset('img/slide-1.jpg') }}" height="70px" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 " src="{{ asset('img/slide-2.jpg') }}" height="70px" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 " src="{{ asset('img/slide-3.jpg') }}" height="70px" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-3" id="nav">
            <a href="{{ route('page','terms-conditions') }}"> <p class="text-center mt-2"> Terms And Condition </p> </a>
        </div>
        <div class="col-md-3 " id="nav">
            <a href="{{ route('page','privacy-policy') }}"> <p class="text-center mt-2"> Privacy Policy </p> </a>
        </div>
        <div class="col-md-3 " id="nav">
            <a href="{{ route('page','security-policy') }}"> <p class="text-center mt-2"> Security Policy</p> </a>
        </div>
        <div class="col-md-3 " id="nav">
            <a href="{{ route('page','contact-us') }}"> <p class="text-center mt-2"> Contact Us </p> </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" style="background-color: #D6D6D6;padding: 1em 0.5em ">
            <h4 class="text-center"> Copyright &copy; 2020-2021 </h4>
        </div>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"> </script>
@yield('page-scripts')
</body>
</html>

