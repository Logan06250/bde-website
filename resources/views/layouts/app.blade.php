<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Site du BDE</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Navbar blade template start-->
                    <nav class="navbar navbar-default navbar-inverse">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="{{ url('/') }}">BDE</a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="{{ (Request::is('events') ? 'active' : '') }}">
                                        <a href="{{ url('events') }}"><i class="fas fa-calendar-alt"></i> Evènements</a>
                                    </li>
                                    <li class="{{ (Request::is('articles') ? 'active' : '') }}">
                                        <a href="{{ url('articles') }}"><i class="fas fa-shopping-cart"></i> Boutique</a>
                                    </li>
                                    <li class="{{ (Request::is('ideas') ? 'active' : '') }}">
                                        <a href="{{ url('ideas') }}"><i class="fas fa-lightbulb"></i> Boite à idées</a>
                                    </li>
                                    <li class="dropdown">
                                        @if (Auth::check())
                                            <!--{{$notifications = App\Notification::all()}}-->
                                            <!-- {{$nbNotif = 0}} -->
                                            @foreach($notifications as $notification)
                                                @if($notification['user_id'] == Auth::user()->id)
                                                    <!-- {{$nbNotif++}} -->
                                                @endif
                                            @endforeach
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fas fa-bell"></i> Notifications <span class="badge">   
                                            {{$nbNotif}}
                                        @endif
                                        </span></a>
                                        <ul class="dropdown-menu">
                                            
                                            @if (Auth::check())
                                                <!--{{$notifications = App\Notification::all()}}-->
                                                @foreach($notifications as $notification)
                                                   @if($notification['user_id'] == Auth::user()->id)
                                                        <li role="presentation" class="divider"></li>
                                                        <li><a href="{{action('NotificationController@destroy', $notification['id'])}}" ><i class="fas fa-ban"></i>
                                                        {{$notification['content']}}</a></li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    @if (Auth::guest())
                                        <li class="{{ (Request::is('auth/login') ? 'active' : '') }}"><a href="{{ route('login') }}"><i
                                                        class="fa fa-sign-in"></i> Connexion</a></li>
                                        <li class="{{ (Request::is('auth/register') ? 'active' : '') }}"><a
                                        href="{{ route('register') }}">Inscription</a></li>
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                aria-expanded="false"><i class="fa fa-user"></i> {{"Bonjour "}}{{ Auth::user()->name }}
                                                <i class="fa fa-caret-down"></i></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        @if(Auth::check())
                                                            <!--@//if(Auth::user()->isAdmin()) -->
                                                                <li>
                                                                    <a href="{{ url('admin') }}"><i class="fas fa-cog"></i> Panel d administration</a>
                                                                </li>
                                                                <li role="presentation" class="divider"></li>
                                                           <!-- @//endif -->
                                                                <li>
                                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                        <i class="fas fa-power-off"></i> Déconnexion
                                                                    </a>
                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</body>
</html>


