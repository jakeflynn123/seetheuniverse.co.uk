<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/adminapp.css">
    <link href='http://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <title>@yield('title')</title>
</head>
<body>
<div id="app">
    @if(Gate::check('see_adminnav'))
        @include('admin/includes/adminnav')
    @elseif(Gate::check('see_creatornav'))
        @include('admin/includes/creatornav')
    @else
        @include('admin/includes/nav')
    @endif

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>

