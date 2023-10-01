<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! seo($seo??null) !!}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
<nav class="container">
    <ul>
        <li><a href="{{ route('html.admin.default') }}"><strong>Shop</strong></a></li>
    </ul>
    <ul>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#" role="button">Button</a></li>
    </ul>
</nav>
<main class="container">
    @hasSection('content')
        @yield('content')
    @endif
</main>
</body>
</html>
