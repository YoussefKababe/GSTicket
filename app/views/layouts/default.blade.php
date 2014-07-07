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
              <?php $notificationsCount = Auth::user()->notifications()->count() ?>
              @if ($notificationsCount != 0)
                <span class="badge pull-right">{{ $notificationsCount }}</span>
              @endif
            </a>
            <ul class="dropdown-menu notifications">
              <div class="dropdown-heading">Notifications</div>
              @if ($notificationsCount == 0)
                <div class="no-notification">Aucune notification</div>
              @else
                @foreach (Auth::user()->notifications->reverse() as $notification)
                  <li>
                    <a href="{{ route('tickets.show', ['id' => $notification->reponse->ticket->id]); }}">
                      <img src="/uploads/userimg/{{ $notification->reponse->utilisateur->photo }}" alt="" class="img img-thumbnail pull-left">
                      <strong>{{ $notification->reponse->utilisateur->nomUtilisateur }}</strong> {{ $notification->message }}:
                      <p>{{ $notification->reponse->ticket->sujet }}</p>
                      <small class="time">{{ $notification->created_at }}</small>
                    </a>
                  </li>
                @endforeach
              @endif
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/uploads/userimg/{{ Auth::user()->photo }}" class="img img-thumbnail pull-left">
              {{ Auth::user()->nomUtilisateur }} 
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('user.show', Auth::user()->nomUtilisateur, Auth::user()->nomUtilisateur) }}">Mes discussions</a></li>
              <li><a href="#">Creer discussion</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('sessions.logout') }}">Se deconnecter</a></li>
            </ul>
          </li>
        @else
          <li><a href="{{ route('sessions.login') }}">Se connecter</a></li>
          <li><a href="{{ route('user.register') }}">Créer un compte</a></li>
        @endif
      </ul>
    </div>
  </nav>

  <section class="main">
    <div class="container">
      @if (Session::has('info'))
        <div class="alert alert-success">{{ Session::get('info') }}</strong></div>
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
</body>
</html>