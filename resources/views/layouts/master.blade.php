<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">
        <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
        <title>@yield('title')</title>
    </head>
    <header>
        @include('includes.header')
    </header>
    <body>
      <?php include_once("analyticstracking.php") ?>

    <div class="containerarticle container containershadow">
        <div class="row">
          @yield('content')

        </div>
    </div>

  @include('includes.footer')
    <script src="/js/app.js"></script>
    </body>
</html>
