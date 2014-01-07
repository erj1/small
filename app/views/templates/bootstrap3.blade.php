<!DOCTYPE html>
<html>
  <head>
    <title>Small | @yield('title', 'Microblog')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ URL::asset('packages/bootstrap-3.0.3/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
      a.laravel-link {
        color: #f4726d;
      }
      a.laravel-link:hover {
        color: #C13F3A;
      }
    </style>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Small</a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::route('home') }}">home</a></li>
            <li><a href="{{ URL::route('posts.index') }}">posts</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1>@yield('title', '')</h1>
        </div>
      </div>
    </div>

    @yield('content')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ URL::asset('packages/bootstrap-3.0.3/js/bootstrap.min.js') }}"></script>
  </body>
</html>