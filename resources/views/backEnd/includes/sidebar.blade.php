<nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Post Management</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong>{{Auth::user()->name}}</strong>
          </span>

          <span class="user-status">
            <i class="fa fa-user"></i>
            <strong>{{userRole(Auth::user()->id)}}</strong>
          </span> 

          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="{{url('/'.userRole(Auth::user()->id,true).'/Dashboard')}}">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
      
          </li>
          @if(userRole(Auth::user()->id)=="admin")
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Post Management</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              <li>
                  <a href="{{url('/category')}}">Category

                  </a>
                </li>
                <li>
                  <a href="{{url('/post')}}">Posts

                  </a>
                </li>
                <li>
                  <a href="#">Comments</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Settingst</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{url('/users')}}">User Management</a>
                </li>
                <li>
                  <a href="{{url('/role')}}">Role Management</a>
                </li>
                <li>
                  <a href="{{url('/permission')}}">Permission Management</a>
                </li>
              </ul>
            </div>
          </li>
      @endif
        @if(userRole(Auth::user()->id)=="author")
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Post Management</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{url('/author/posts')}}">Posts

                  </a>
                </li>
              </ul>
            </div>
          </li>
      @endif
        @if(userRole(Auth::user()->id)=="editor")
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Post Management</span>
              <span class="badge badge-pill badge-danger">3</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="{{url('/editor/posts')}}">Posts

                  </a>
                </li>
              </ul>
            </div>
          </li>
      @endif
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="fa fa-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      
       <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->