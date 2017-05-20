@inject('galleries', 'App\Services\GalleryService')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>eLibrary - Home Page</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{ asset('frontend/mdb.min.css') }}" rel="stylesheet">

    <!-- Template styles -->
    <link href="{{ asset('frontend/style.css') }}" rel="stylesheet">

</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-toggleable-md navbar-dark scrolling-navbar fixed-top">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapseEx2" aria-controls="collapseEx2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('images/logo.png') }}" class="d-inline-block align-top z-depth-0" alt="MDBootstrap" width="150px">
            </a>
            <div class="collapse navbar-collapse" id="collapseEx2">
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login to Admin <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->

    <!--Carousel Wrapper-->
    <div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
        <?php $i = 0; ?>
          @foreach($galleries->all() as $gallery)
            <!--First slide-->
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}" style="background-image: url('{{ url('images/gallery/' . $gallery->path) }}');background-repeat: no-repeat;background-size: cover">
                <!--Mask-->
                <div class="view hm-black-light">
                    <div class="full-bg-img flex-center">
                        <ul class="animated fadeInUp col-md-12">
                            <li>
                                <h1 class="h1-responsive flex-item">Material Design for Bootstrap 4</h1>
                            </li>
                            <li>
                                <p class="flex-item">The most powerful and free UI KIT for Bootstrap</p>
                            </li>
                            <li>
                                <a target="_blank" href="https://mdbootstrap.com/getting-started/" class="btn btn-primary btn-lg flex-item">Sign up!</a>
                            </li>
                            <li>
                                <a target="_blank" href="https://mdbootstrap.com/material-design-for-bootstrap/" class="btn btn-default btn-lg flex-item">Learn more</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--/.Mask-->
            </div>
          <?php $i++; ?>  
          @endforeach
        </div>
        <!--/.Slides-->
        <!--Indicators-->
        <ol class="carousel-indicators">
          @for($j = 0; $j < $i; $j++)
            <li data-target="#carousel-example-1" data-slide-to="{{ $j }}" class="{{ $j == 0 ? 'active' : '' }}"></li>
          @endfor
        </ol>
        <!--/.Indicators-->

        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('frontend/jquery.min.js') }}"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('frontend/tether.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('frontend/bootstrap.min.js') }}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('frontend/mdb.min.js') }}"></script>


</body>

</html>