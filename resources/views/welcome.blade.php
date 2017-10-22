<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Du Lịch Bụi</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('js/login.js') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/font/css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css">
    <!-- stylesheet -->
    <link rel="stylesheet" href="css/mystyle.css">

</head>
<body id="myPage">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="header-logo" href="#">
                        <img src="{{asset('imghome/logo_travelVietNam.png')}}">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                            <li><a href="{{ route('login') }}"  >Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>
        <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="{{asset('/imghome/1467702984.jpg')}}">
          </div>

          <div class="item">
            <img src="{{asset('/imghome/1508513276.jpg')}}">
          </div>
        
          <div class="item">
            <img src="{{asset('/imghome/1508513289.jpg')}}">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
            <h2>New Plans</h2>
            <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
        <table width="100%" border="0" cellpadding="10px" >
            <tr valign="top" bgcolor="#e6eeff">
                <td width="50">
                    <img src="http://images.ndh.vn/Images/Uploaded/Share/2013/12/16/8c8images601608thuyta0e6c7.jpg" alt="">
                </td>
                <td width="100" height="200" align="auto">
                <h4>Name: Du lịch quanh Sơn Tây </h4>
                <h5>Max People: 10</h5>
                <h5>Start Time: 1/1/2018</h5>
                <h5>Finish: 1/1/2018</h5>
                <h5>Status: Wating</h5>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ route('register') }}" type="button" class="btn btn-danger">Join us</a>
                    </div>
                </div>
                </td>
            </tr>

            <tr valign="top" bgcolor="#e6eeff">
                <td width="100" height="200" align="auto">
                <h4>Name: Du lịch quanh Sơn Tây </h4>
                <h5>Max People: 10</h5>
                <h5>Start Time: 1/1/2018</h5>
                <h5>Finish: 1/1/2018</h5>
                <h5>Status: Wating</h5>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{ route('register') }}" type="button" class="btn btn-danger">Join us</a>
                    </div>
                </div>
                </td>
                <td width="50">
                    <img src="http://baoduongsat.vn/wp-content/uploads/2016/05/du-lich-da-lat-1.jpg" align="right">
                </td>                
            </tr>
        </table>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <br>
            <h2>Hot Plans</h2>
            <hr style=" height: 30px; border-style: solid; border-color: #8c8b8b; border-width: 1px 0 0 0; border-radius: 20px">
            <table width="100%" border="0" cellpadding="10px" >
                <tr valign="top" bgcolor="#e6eeff">
                    <td width="50">
                        <img src="http://images.ndh.vn/Images/Uploaded/Share/2013/12/16/8c8images601608thuyta0e6c7.jpg" alt="">
                    </td>
                    <td width="100" height="200" align="auto">
                        <h4>Name: Du lịch quanh Sơn Tây </h4>
                        <h5>Max People: 10</h5>
                        <h5>Start Time: 1/1/2018</h5>
                        <h5>Finish: 1/1/2018</h5>
                        <h5>15 comments- 19 follows </h5>                        
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ route('register') }}" type="button" class="btn btn-danger">Join us</a>
                        </div>
                    </div>
                    </td>
                </tr>

                <tr valign="top" bgcolor="#e6eeff">
                    <td width="100" height="200" align="auto">
                        <h4>Name: Du lịch quanh Sơn Tây </h4>
                        <h5>Max People: 10</h5>
                        <h5>Start Time: 1/1/2018</h5>
                        <h5>Finish: 1/1/2018</h5>
                        <h5>15 comments- 19 follows </h5>                        
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ route('register') }}" type="button" class="btn btn-danger">Join us</a>
                        </div>
                    </div>
                    </td>
                    <td width="50">
                        <img src="http://baoduongsat.vn/wp-content/uploads/2016/05/du-lich-da-lat-1.jpg" align="right">
                    </td>                
                </tr>
                <tr valign="top" bgcolor="#e6eeff">
                    <td width="50">
                        <img src="http://images.ndh.vn/Images/Uploaded/Share/2013/12/16/8c8images601608thuyta0e6c7.jpg" alt="">
                    </td>
                    <td width="100" height="200" align="auto">
                        <h4>Name: Du lịch quanh Sơn Tây </h4>
                        <h5>Max People: 10</h5>
                        <h5>Start Time: 1/1/2018</h5>
                        <h5>Finish: 1/1/2018</h5>
                        <h5>15 comments- 19 follows </h5>    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{ route('register') }}" type="button" class="btn btn-danger">Join us</a>
                        </div>
                    </div>
                    </td>
                </tr>
            </table>    
        </div>
    </div>
    <footer class="text-center">
          <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
          </a><br><br>
          <p>Click to top </p> 
        </footer>

    <script>
    $(document).ready(function(){
        // Initialize Tooltip
        $('[data-toggle="tooltip"]').tooltip(); 
    })
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>