<!doctype html>
<html lang="en" data-theme="da2rk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! seo($seo??null) !!}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/combine/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css,npm/bootstrap-utilities@4.1.3/bootstrap-utilities.css,npm/@picocss/pico@1/css/pico.min.css">
</head>
<body>
<nav class="container">
    <ul>
        <li><a href="{{ route('admin.index') }}"><strong>Shop</strong></a></li>
    </ul>
    <ul class="d-none">
        <li>
            <a href="#" style="
            position: relative;
            width: calc(1rem + var(--nav-link-spacing-horizontal) * 2);
    height: calc(1rem + var(--nav-link-spacing-vertical) * 2);">
                @include('Html::admin.components.icons.burger', ['style'=>'position: absolute; left: calc(50% - 0.5rem); top: calc(50% - 0.5rem); height: 1rem; color: var(--color);'])
            </a>
        </li>
    </ul>
    <ul>
        <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
        <li><a href="{{ route('admin.products.index') }}">Products</a></li>
        <li>
            <details role="list" dir="rtl">
                <summary aria-haspopup="listbox" role="link">Dropdown</summary>
                <ul role="listbox">
                    <li><a>Action</a></li>
                    <li><a>Another action</a></li>
                    <li><a>Something else here</a></li>
                </ul>
            </details>
        </li>
    </ul>
</nav>
<main class="container">
    @hasSection('content')
        @yield('content')
    @endif
</main>
</body>
</html>
