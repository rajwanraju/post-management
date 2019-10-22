
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  <a class="navbar-brand" href="{{url('/')}}">Post Management</a>
  
  <ul class="navbar-nav ml-auto">
     @if (Route::has('login'))
                  @auth
                  <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                  @else
                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                  @if (Route::has('register'))
                  <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                  @endif
                  @endauth
                  @endif
 
   @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                     {{Auth::user()->name}}
                 </a>
                 <div class="dropdown-menu">
                  @if(userRole(Auth::user()->id) =="user")
                  <a class="dropdown-item" href="{{url('likepost')}}">Like Post</a>
                  <a class="dropdown-item" href="{{url('dislikePost')}}">Dislike Post</a>
                  <a class="dropdown-item" href="{{url('wishlistPost')}}">Wish List</a>
                  @else
                    <a class="dropdown-item" href="{{url('/'.userRole(Auth::user()->id).'/Dashboard')}}">Dashboard</a>

                    @endif
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
</nav>