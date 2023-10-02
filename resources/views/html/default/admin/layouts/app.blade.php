<!doctype html>
<html lang="en" data-theme="da2rk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! seo($seo??null) !!}
    <link rel="stylesheet" href="{{ asset('/css/spectre.css') }}">
    <style>
        .icon {
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .table-column-small tr th:first-child,
        .table-column-small tr td:first-child {
            width: 50px;
            min-width: 50px;
            max-width: 50px;
            word-break: break-all;
        }

        .table-checkbox {
            margin: 0;
            padding: 0;
            min-height: 1rem;
        }

        .btn-link-error, .btn-link-error:focus, .btn-link-error:hover {
            background: 0 0;
            border-color: transparent;
            color: #e85600;
        }
        .btn-link-error:focus{
            box-shadow: 0 0 0 0.1rem rgba(217, 80, 0, 0.2);
        }
        .btn-link-white, .btn-link-white:focus, .btn-link-white:hover {
            background: 0 0;
            border-color: transparent;
            color: #fff;
        }
        .btn-link-white:focus{
            box-shadow: 0 0 0 0.1rem rgba(255, 255, 255, 0.2);
        }
        .link-reset, .link-reset.active, .link-reset:active, .link-reset:focus, .link-reset:hover{
            color: inherit;
        }
        a.text-error:focus{
            box-shadow: 0 0 0 0.1rem rgba(217, 80, 0, 0.2);
        }
        .menu .menu-item>a.text-error:focus, .menu .menu-item>a.text-error:hover{
            background: #f8f0ed;
        }
    </style>
</head>
<body>
<main class="container" style="max-width: 1440px">
    <header class="navbar pt-2">
        <section class="navbar-section">
            <a href="{{ route('admin.index') }}" class="navbar-brand mr-2"
               style="color: currentColor;font-weight: 700;border-color: transparent;">
                Админка магазина
            </a>
            <a href="{{ route('admin.users.index') }}" class="btn btn-link" style="border-color: transparent;">
                Пользователи
            </a>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-link" style="border-color: transparent;">
                Роли
            </a>
            <a href="{{ route('admin.products.index') }}" class="btn btn-link" style="border-color: transparent;">
                Товары
            </a>
        </section>
        <section class="navbar-section">
            <div class="input-group input-inline">
                <input class="form-input" type="text" placeholder="Глобальный поиск">
                <button class="btn btn-primary input-group-btn">
                    <i class="icon icon-search"></i>
                </button>
            </div>
        </section>
    </header>
    @hasSection('content')
        @yield('content')
    @endif
</main>
</body>
</html>
