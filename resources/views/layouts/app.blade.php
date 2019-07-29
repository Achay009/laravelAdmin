<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  z-index: 100; /* Behind the navbar */
  padding: 48px 0 0; /* Height of navbar */
  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
  margin-top: 59px;
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: .5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}

@supports ((position: -webkit-sticky) or (position: sticky)) {
  .sidebar-sticky {
    position: -webkit-sticky;
    position: sticky;
  }
}

.sidebar .nav-link {
  font-weight: 500;
  color: white;
}

.sidebar .nav-link .feather {
  margin-right: 5px;
  color: #999;
}

.sidebar .nav-link.active {
  color: white;
}

.sidebar .nav-link:hover .feather,
.sidebar .nav-link.active .feather {
  color: white;
}

.sidebar-heading {
  font-size: .75rem;
  text-transform: uppercase;
}




.navbar-brand{
     font-family: cursive;
     color:black;
}





/*
 * Content
 */

[role="main"] {
  padding-top: 133px; /* Space for fixed navbar */
}

@media (min-width: 768px) {
  [role="main"] {
    padding-top: 48px; /* Space for fixed navbar */
  }
}



            .m-b-md {
                margin-bottom: 30px;
            }

            .Works span{
                font-size: 120px;
                font-family: cursive;
                color:black;
                animation: blink 1s linear infinite;
            }

            @-webkit-keyframes blink {
                0%{opacity: 0;}
                50%{opacity: .5;}
                100%{opacity: 1;}
            }
               .title {
                font-size: 84px;
            }
            .content{
                text-align:center;
            }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <span>  {{ config('app.name', 'Laravel') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Auth::check())
           <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
      <div class="sidebar-sticky">
        <a class = "nav-link" href=""><h2>Dashboard</h2></a>
        <br/>
        
        <ul class="nav flex-column">
          <li class="nav-item border-dark ">
            <a class="nav-link active" href="/Dashboard/employeeHome">
              <span data-feather="users"></span>
              Employees
            </a>
          </li>
          <li class="nav-item border-dark ">
            <a class="nav-link" href="/Dashboard/companyHome">
              <span data-feather="home"></span>
              Company
            </a>
          </li>
          
        </ul>

        
      </div>
    </nav>  
           @endif
      

        <main class=" col-md-9 ml-sm-auto col-lg-10 ">
            <div class = " align-items-center  ">
                @include('inc.messages')
                @yield('content')
            </div>
        </main>
       
{{-- 
           <div class="title m-b-md Works content">
                   <span class = "blink">Please Login</span>
                </div> --}}




    </div>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
</body>
</html>
