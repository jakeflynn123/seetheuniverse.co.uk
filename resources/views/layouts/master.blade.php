<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/app.css">

        <title>@yield('title')</title>

    </head>
    <header>
        @include('includes.header')
    </header>
    <body>

    <div class="containerarticle container containershadow">
        <div class="row">
          @yield('content')

        </div>
    </div>

  @include('includes.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>
