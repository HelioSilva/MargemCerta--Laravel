<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MargemCerta - @yield('title')</title>


    <link rel="stylesheet" type="text/css" href="/css/app.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

    @include('templates.nav');

    <div class="container">
        @yield('site');
    </div>
    
    <script>
      @yield('script')
    </script>
    <script src="/js/app.js"></script>
</body>
</html>