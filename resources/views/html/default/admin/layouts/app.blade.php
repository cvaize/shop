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
    <style>
        :root:not([data-theme=dark]), [data-theme=light] {
            /*--primary: #0d6efd;*/
            /*--secondary: #6c757d;*/
            /*--success: #198754;*/
            /*--danger: #dc3545;*/
            /*--warning: #ffc107;*/
            /*--info: #0dcaf0;*/
            /*--light: #f8f9fa;*/
            /*--dark: #212529;*/
            /*--del-color: var(--danger);*/
            --font-size: 16px;
            --spacing: 0.5rem;
            --form-element-spacing-vertical: 0.25rem;
            --form-element-spacing-horizontal: 0.3rem;
        }

        input:not([type=checkbox],[type=radio],[type=range],[type=file])[type=search] {
            background-position: center left 0.5rem;
        }

        [role=button], button, input[type=button], input[type=reset], input[type=submit] {
            white-space: nowrap;
        }

        /*tfoot td input, tfoot th input, thead td input, thead th input, tfoot td select, tfoot th select, thead td select, thead th select{*/
        /*    --border-width: 1px;*/
        /*    width: calc( 100% + 10px);*/
        /*}*/
        table input:not([type=checkbox],[type=radio]), table textarea, table select, table details[role=list] summary + ul, table li[role=list] > ul,
        table [role="button"]{
            --border-width: 1px;
        }

        table select {
            width: fit-content;
        }

        table input:not([type=checkbox],[type=radio]), table textarea {
            min-width: 80px;
        }

        table select, table input, table label, table label, table input:not([type=checkbox],[type=radio]), table textarea {
            margin: 0;
        }

        select:not([multiple],[size]) {
            background-position: center right 0.25rem;
        }

        input:not([type=checkbox],[type=radio],[type=range],[type=file]):is([type=date],[type=datetime-local],[type=month],[type=time],[type=week]) {
            --icon-position: 0.25rem;
        }

        :not(thead,tfoot) > * > td {
            --font-size: 1em;
        }
    </style>
</head>
<body>
<main class="container" style="padding-top: 0;">
    <nav class="container">
        <ul>
            <li><a href="{{ route('admin.index') }}"><strong>Shop</strong></a></li>
        </ul>
        <ul class="d-none d-sm-flex">
            <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
            <li><a href="{{ route('admin.products.index') }}">Products</a></li>
        </ul>
        <ul class="d-flex d-sm-non2e">
            <li>
                <details role="list" dir="rtl">
                    <summary aria-haspopup="listbox" role="link">Menu</summary>
                    <ul role="listbox">
                        <li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
                        <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
                        <li><a href="{{ route('admin.products.index') }}">Products</a></li>
                    </ul>
                </details>
            </li>
        </ul>
    </nav>
    @hasSection('content')
        @yield('content')
    @endif
</main>
</body>
</html>
