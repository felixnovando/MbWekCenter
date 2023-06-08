<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>MbWekCenter</title>
</head>
<body>
    @include('component.header')

    @yield('content')

    @include('component.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
