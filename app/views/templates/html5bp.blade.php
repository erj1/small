<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="{{ URL::asset('css/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

        <!--[if lt IE 9]>
            <script src="{{ URL::asset('js/vendor/html5-3.6-respond-1.1.0.min.js') }}"></script>
        <![endif]-->
    </head>
    <body>
      <div class="content-wrap">
        <div class="header-container">
            <header class="wrapper clearfix">
                <h1 class="title">@yield('title', 'Small')</h1>
                <nav>
                    <ul>
                        <li><a href="{{ URL::route('home') }}">home</a></li>
                        <li><a href="{{ URL::route('posts.index') }}">posts</a></li>
                        <li><a href="{{ URL::route('about') }}">about</a></li>
                    </ul>
                </nav>
            </header>
        </div>

        <div class="main-container">
            <div class="main wrapper clearfix">
                @yield('content')
            </div> <!-- #main -->
        </div> <!-- #main-container -->
      </div> <!-- .content-wrap -->

        <div class="footer-container">
            <footer class="wrapper">
                @yield('footer', '<h3>footer</h3>')
            </footer>
        </div>

        <script src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>
