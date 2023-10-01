@extends('Html::admin.layouts.app', ['seo' => $seo ?? null])
{{--id--}}
{{--language_id--}}
{{--currency_id--}}
{{--name--}}
{{--email--}}
{{--email_verified_at--}}
{{--status--}}
{{--superuser--}}
@section('content')
    <figure style="margin-bottom: 0;">
        <nav aria-label="breadcrumb" style="position:relative;">
            <ul>
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li>Users</li>
            </ul>
        </nav>
    </figure>
    <figure>
        <table role="grid">
            <thead>
            <tr>
                <th scope="col">
                    <label for="selected-all">
                        <input type="checkbox" id="selected-all" name="selected_all" value="1">
                    </label>
                </th>
                <th scope="col">ID</th>
                <th scope="col">Статус</th>
                <th scope="col">ФИО</th>
                <th scope="col">Email</th>
                <th scope="col">Дата верификации</th>
                <th scope="col">Валюта</th>
                <th scope="col">Язык</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label for="selected-1">
                        <input type="checkbox" id="selected-1" name="selected[]" value="1">
                    </label>
                </td>
                <th scope="row">1</th>
                <td>Включён</td>
                <td>Орлов Дмитрий Алесандрович</td>
                <td>cvaize@gmail.com</td>
                <td>11.11.1111 11:11:11</td>
                <td>Рубли</td>
                <td>Русский</td>
            </tr>
            <tr>
                <td>
                    <label for="selected-2">
                        <input type="checkbox" id="selected-2" name="selected[]" value="2">
                    </label>
                </td>
                <th scope="row">2</th>
                <td>Включён</td>
                <td>Орлов Дмитрий Алесандрович</td>
                <td>cvaize@gmail.com</td>
                <td>11.11.1111 11:11:11</td>
                <td>Рубли</td>
                <td>Русский</td>
            </tr>
            </tbody>
        </table>
    </figure>
@endsection
