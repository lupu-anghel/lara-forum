<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lara-Forum') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <!-- highlight -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/atom-one-dark.min.css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
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
                    <a class="navbar-brand" href="{{ route('forum') }}">
                        {{ config('app.name', 'Lara-Forum') }}
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
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        

        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-success form-control" href="{{ route('discussion.create') }}" style="margin-bottom: 10px;">
                        Create new discussion
                    </a>
                    <!-- Filters menu-->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Filters
                        </div>

                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <i class="fa fa-user"></i> 
                                    <a href="/forum?filter=me">My discussions</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-check"></i> 
                                    <a href="/forum?filter=solved">Closed discussions</a>
                                </li>

                                <li class="list-group-item">
                                    <i class="fa fa-flag"></i> 
                                    <a href="/forum?filter=unsolved">Opened discussions</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Channels menu-->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Channels
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">

                                @if(Auth::check())
                                
                                    @if(Auth::user()->admin)
                                        
                                        <li class="list-group-item">
                                            <a href="/channels">
                                                <i class="fa fa-list"></i>
                                                View all channels
                                            </a>
                                        </li>

                                    @endif

                                @endif


                                @foreach($channels as $channel)
                                    
                                    <li class="list-group-item">
                                        <i class="fa fa-arrow-circle-right"></i>
                                        <a href="{{ route('channel', ['slug' => $channel->slug]) }}">
                                            {{ $channel->title }}
                                        </a>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                    <!-- Errors display -->
                    @if($errors->count() > 0)

                        @foreach($errors->all() as $error)

                            <div class="alert alert-danger alert-dismissible" role="alert">

                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <strong><i class="fa fa-exclamation-triangle"></i></strong> {{ $error }}

                            </div>

                        @endforeach

                    @endif

                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    
    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('success'))

            toastr.success(' {{ Session::get('success') }} ')

        @endif
    </script>

    <!-- highlight -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
