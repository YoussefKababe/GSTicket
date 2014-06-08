<!doctype html>
<html class="home-page" lang="en">
<head>
  <meta charset="UTF-8">
  <title>GSTicket | Home</title>
  {{ stylesheet_link_tag() }}
</head>
<body>
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ url('/') }}">GSTicket</a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-bell"></i>
              <span class="badge pull-right">5</span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->nomUtilisateur }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('user.show', Auth::user()->nomUtilisateur, Auth::user()->nomUtilisateur) }}">Mes discussions</a></li>
              <li><a href="#">Creer discussion</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('sessions.logout') }}">Se deconnecter</a></li>
            </ul>
          </li>
        @else
          <li><a href="{{ route('sessions.login') }}">Se connecter</a></li>
        @endif
      </ul>
    </div>
  </nav>

  <section class="main">
    <div class="container">
      @if (Session::has('welcome'))
        <div class="alert alert-success">{{ Session::get('welcome') }} <strong>{{ Auth::user()->nomUtilisateur }}!</strong></div>
      @endif
      @yield('content')
    </div>
  </section>

  <footer>
    <div class="container">
      <a href="{{ url('/') }}">GSTicket</a>
    </div>
  </footer>

  {{ javascript_include_tag() }}
  @yield('scripts')
</body>
</html>