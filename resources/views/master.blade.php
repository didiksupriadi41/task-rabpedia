<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPL Monev - @yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css"
        integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
    <script src="/js/app.js" defer></script>
    @yield('head-extra')
</head>

<body>
    @if (Auth::check())
    @include('nav')
    @endif
    <div class="container">
        @yield('content')
    </div>
</body>
@yield('script-end')

</html>