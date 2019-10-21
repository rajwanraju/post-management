<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Post Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


        <!-- Styles -->
<style>
    .site-heading h3{
    font-size : 40px;
    margin-bottom: 15px;
    text-transform: uppercase;
    font-weight: 600;
}
.border {
    background: #d1360e;
    height: 2px;
    width: 165px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 25px;
}
/* Blog-CSS */
.blog-box {
    padding: 0 0px;
    transition: .5s;
    border: 1px solid #e2e2e2;
    margin-bottom: 30px;
}
.blog-box-content h4 a {
    font-size: 20px;
    padding: 0px 0 0px;
    text-transform: uppercase;
    color:#2b2b2b;
     text-decoration:none;
    
}
.blog-box-content h4:hover {
    color:#000;
     text-decoration:none;
    
}

.blog-box-content {
padding: 0 20px 20px;
}
.blog-box-text h4 a {
    color: #333;
}</style>
    </head>
    <body>


        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="#" class="navbar-brand">Brand</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                  @if (Route::has('login'))
                  @auth
                  <a class="nav-item nav-link" href="{{ url('/home') }}">Home</a>
                  @else
                  <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>

                  @if (Route::has('register'))
                  <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
                  @endif
                  @endauth
                  @endif
              </div>
              <form class="form-inline ml-auto">
               <ul class="navbar-nav ml-aut">
                <!-- Dropdown -->
                @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                     {{Auth::user()->name}}
                 </a>
                 <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i>{{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            </li>
            @endauth
        </ul>
    </form>
</div>
</nav>

       <div class="blog-section paddingTB60 ">
<div class="container">
    <div class="row">
        <div class="site-heading text-center">
                        <h3>Our Portfolio</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt <br> ut labore et dolore magna aliqua. Ut enim ad minim </p>
                        <div class="border"></div>
                    </div>
    </div>
    <div class="row text-center">
           <div class="col-sm-6 col-md-4">
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <img src="https://images.pexels.com/photos/6384/woman-hand-desk-office.jpg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-fluid img-thumbnaile" alt="">
                                </div>
                                <div class="blog-box-content">
                                    <h4><a href="#">quis porta tellus dictum</a></h4>
                                    <p>Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
                                    Sed ornare ligula eget tortor tempor, quis porta tellus dictum.</p>
                                    <a href="" class="btn btn-default site-btn">Read More</a>
                                </div>
                            </div>
                        </div> <!-- End Col -->                 
            <div class="col-sm-6 col-md-4">
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <img src="https://images.pexels.com/photos/374897/pexels-photo-374897.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-fluid img-thumbnaile" alt="">
                                </div>
                                <div class="blog-box-content">
                                    <h4><a href="#">quis porta tellus dictum</a></h4>
                                    <p>Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
                                    Sed ornare ligula eget tortor tempor, quis porta tellus dictum.</p>
                                    <a href="" class="btn btn-default site-btn">Read More</a>
                                </div>
                            </div>
                        </div> <!-- End Col -->             
            <div class="col-sm-6 col-md-4">
                            <div class="blog-box">
                                <div class="blog-box-image">
                                    <img src="https://images.pexels.com/photos/541522/pexels-photo-541522.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" class="img-fluid img-thumbnaile" alt="">
                                </div>
                                <div class="blog-box-content">
                                    <h4><a href="#">quis porta tellus dictum</a></h4>
                                    <p>Phasellus lorem enim, luctus ut velit eget, convallis egestas eros. 
                                    Sed ornare ligula eget tortor tempor, quis porta tellus dictum.</p>
                                    <a href="" class="btn btn-default site-btn">Read More</a>
                                </div>
                            </div>
                        </div> <!-- End Col -->
    </div>
</div>
</div>
    </body>
</html>
