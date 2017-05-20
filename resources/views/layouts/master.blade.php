<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>eLibrary - @yield('pg-title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
    .sidebar .menu .list li.active > :first-child span,
    .sidebar .menu .list li.active > :first-child i {
        color: #F44336;
        font-weight: bold;
    }
    </style>
</head>

<body class="theme-red">
    <body class="theme-red">

    <!-- Page Loader -->
    @include('layouts.master.loader')
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    
    <!-- Search Bar -->
    @include('layouts.master.searchbar')
    
    <!-- Top Bar -->
    @include('layouts.master.topbar')
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        @include('layouts.master.leftsidebar')
        
        <!-- Right Sidebar -->
        @include('layouts.master.rightsidebar')
    </section>

    <section class="content">
        <div class="container-fluid">
            @if(Request::is('dashboard'))
                @include('layouts.partials.widgets')
            @endif 
           <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>@yield('pg-head-left')</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    @yield('pg-head-right')
                                </div>
                            </div>
                        </div>
                        <div class="body" id="app">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src=" {{ asset("js/app.js") }}"></script>
    <script src=" {{ asset("js/vendor.js") }}"></script>
    @include('layouts.partials.flash')
    @yield('scripts')
</body>

</html>