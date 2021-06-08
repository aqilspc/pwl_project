<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>SIMBASRI | HomePage</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>
        

        <!-- Bootsrap -->
        <link rel="stylesheet" href="{{url('web/assets/css/bootstrap.min.css')}}">

        <!-- Font awesome -->
        <link rel="stylesheet" href="{{url('web/assets/css/font-awesome.min.css')}}">

        <!-- Owl carousel -->
        <link rel="stylesheet" href="{{url('web/assets/css/owl.carousel.css')}}">

        <!-- Template main Css -->
        <link rel="stylesheet" href="{{url('web/assets/css/style.css')}}">
        
        <!-- Modernizr -->
        <script src="{{url('web/assets/js/modernizr-2.6.2.min.js')}}"></script>


    </head>

    <body>


    <header class="main-header">
        
    
        <nav class="navbar navbar-static-top">



            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                  <a class="navbar-brand" href="{{url('web/index.html')}}">SIMBASRI</a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">
                    @guest
                    <li><a class="is-active" href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('web/about.html')}}">Donation Activities</a></li>
                    <li><a href="{{url('login/auth')}}">Login</a></li>
                    @endauth
                     @auth
                     <li><a class="is-active" href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('web/about.html')}}">Donation Activities</a></li>
                    <li><a href="{{url('web/gallery.html')}}">Halo, {{Auth::user()->name}}</a></li>
                    <li><a href="{{url('log_out_customer')}}">Logout</a></li>
                    @endauth
                    

                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->