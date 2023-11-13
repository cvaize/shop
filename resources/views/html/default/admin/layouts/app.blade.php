<!doctype html>
<html lang="en" data-theme="da2rk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy"
          content="base-uri 'self'; default-src https://mc.yandex.ru https://yastatic.net 'self' 'nonce-{{ base64_encode( random_bytes( 16 ) ) }}'; style-src 'unsafe-inline' 'self'; img-src https://mc.yandex.ru 'self' blob: data:; frame-src https://www.youtube.com https://player.vimeo.com blob: https://mc.yandex.ru; connect-src 'self' https://mc.yandex.ru; child-src blob: https://mc.yandex.ru;">
    {!! seo($seo??null) !!}
    <link rel="stylesheet" href="{{ asset('/css/spectre.css') }}">
    <style>
        .icon {
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .table-column-checkbox {
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

        .btn-link-error, .btn-link-error:focus, .btn-link-error:hover, .btn-link-error:visited {
            background: 0 0;
            border-color: transparent;
            color: #e85600;
        }

        .btn-link-error:focus {
            box-shadow: 0 0 0 0.1rem rgba(217, 80, 0, 0.2);
        }

        .btn-link-white, .btn-link-white:focus, .btn-link-white:hover, .btn-link-white:visited {
            background: 0 0;
            border-color: transparent;
            color: #fff;
        }

        .btn-link-white:focus {
            box-shadow: 0 0 0 0.1rem rgba(255, 255, 255, 0.2);
        }

        .link-reset, .link-reset.active, .link-reset:active, .link-reset:focus, .link-reset:hover, .link-reset:visited {
            color: inherit;
        }

        a.text-error:focus {
            box-shadow: 0 0 0 0.1rem rgba(217, 80, 0, 0.2);
        }

        .menu .menu-item > a.text-error:focus, .menu .menu-item > a.text-error:hover {
            background: #f8f0ed;
        }

        .table-column-id {
            max-width: 100px;
        }

        .form-checkbox.indeterminate > .form-icon, .form-checkbox.checked > .form-icon, .form-radio.checked > .form-icon, .form-switch.checked > .form-icon {
            background: #5755d9;
            border-color: #5755d9;
        }

        .form-checkbox.indeterminate > .form-icon:before {
            background: #fff;
            content: "";
            height: 2px;
            left: 50%;
            margin-left: -5px;
            margin-top: -1px;
            position: absolute;
            top: 50%;
            width: 10px;
        }

        .form-checkbox.checked > .form-icon:before {
            background-clip: padding-box;
            border: 0.1rem solid #fff;
            border-left-width: 0;
            border-top-width: 0;
            content: "";
            height: 9px;
            left: 50%;
            margin-left: -3px;
            margin-top: -6px;
            position: absolute;
            top: 50%;
            transform: rotate(45deg);
            width: 6px;
        }

        .display-block {
            position: fixed;
            left: -100px;
            top: -100px;
            width: 0;
            height: 0;
            opacity: 0;
        }

        .display-block:not(:checked) ~ .display-block-block {
            display: none;
        }

        .toast-fixed {
            position: fixed;
            z-index: 9999;
            width: 280px;
            max-width: calc(100vw - 20px);
            right: 10px;
            top: 10px;
            max-height: calc(100vh - 20px);
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
            <a href="{{ route('admin.products.index') }}" class="btn btn-link" style="border-color: transparent;">
                Товары
            </a>
            <a href="{{ route('admin.currencies.index') }}" class="btn btn-link" style="border-color: transparent;">
                Валюты
            </a>
            <a href="{{ route('admin.languages.index') }}" class="btn btn-link" style="border-color: transparent;">
                Языки
            </a>
        </section>
        <section class="navbar-section">
            <form action="{{ route('admin.search.index') }}" method="GET" class="input-group input-inline">
                <input class="form-input" type="text" placeholder="Поиск" name="search"
                       value="{{ $frd['search'] ?? '' }}">
                <button type="submit" class="btn btn-primary input-group-btn">
                    <i class="icon icon-search"></i>
                </button>
            </form>
        </section>
    </header>
    @if(Session::has('success'))
        <div>
            @include('Html::admin.components.forms.display-block', ['class' => 'toast toast-success toast-fixed', 'content' => Session::get('success')])
        </div>
    @endif
    @hasSection('breadcrumb')
        @yield('breadcrumb')
    @endif
    @hasSection('content')
        @yield('content')
    @endif
</main>
</body>
</html>
