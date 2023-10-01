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
    <figure class="mb-0 d-flex flex-wrap align-items-center p-1">
        <nav aria-label="breadcrumb" style="position:relative;">
            <ul>
                <li><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li>Users</li>
            </ul>
        </nav>
    </figure>
    <figure class="mb-0 py-1">
        <table role="grid">
            <thead>
            <tr>
                <th scope="col">
                    <nav class="align-items-center" style="height: 2.5rem;">
                        <details role="list" style="font-size: inherit;" class="mb-0">
                            <summary aria-haspopup="listbox" role="link" class="align-items-center">
                                @include('Html::admin.components.icons.trash')
                            </summary>
                            <ul role="listbox">
                                <li><a href="{{ route('admin.users.index') }}">Удалить</a></li>
                            </ul>
                        </details>
                    </nav>
                </th>
                <th scope="col">ID</th>
                <th scope="col">Статус</th>
                <th scope="col">ФИО</th>
                <th scope="col">Email</th>
                <th scope="col">Дата верификации</th>
                <th scope="col">Валюта</th>
                <th scope="col">Язык</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <thead>
            <tr>
                <th scope="col">
                    <label for="selected-all" class="d-flex">
                        <input type="checkbox" id="selected-all" name="selected_all" value="1">
                    </label>
                </th>
                <th scope="col">
                    <label for="test">
                        <input type="text" placeholder="test" name="test" style="max-width: 80px;">
                    </label>
                </th>
                <th scope="col">
                    <label for="status">
                        <select id="status" name="status">
                            <option value="20" selected>Все</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                    </label>
                </th>
                <th scope="col">
                    <label for="fio">
                        <input type="text" placeholder="ФИО" name="fio">
                    </label>
                </th>
                <th scope="col">
                    <label for="email">
                        <input type="text" placeholder="email" name="email">
                    </label>
                </th>
                <th scope="col">
                    <label for="datetime">
                        <input type="datetime-local" placeholder="datetime" name="datetime">
                    </label>
                </th>
                <th scope="col">
                    <label for="status1">
                        <select id="status1" name="status1">
                            <option value="20" selected>Все</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                    </label>
                </th>
                <th scope="col">
                    <label for="status2">
                        <select id="status2" name="status2">
                            <option value="20" selected>Все</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="500">500</option>
                            <option value="1000">1000</option>
                        </select>
                    </label>
                </th>
                <th scope="col">
                    <div class="d-flex">
                        <a href="#" role="button" class="ml-1" style="font-size: inherit;">
                            @include('Html::admin.components.icons.trash')
                        </a>
                        <a href="#" role="button" class="ml-1" style="font-size: inherit;">
                            @include('Html::admin.components.icons.trash')
                        </a>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <label for="selected-1">
                        <input type="checkbox" id="selected-1" name="selected[]" value="1">
                    </label>
                </td>
                <th scope="row"><a href="#">1</a></th>
                <td><a href="#">Включён</a></td>
                <td><a href="#">Орлов Дмитрий Алесандрович</a></td>
                <td><a href="#">cvaize@gmail.com</a></td>
                <td><a href="#">11.11.1111 11:11:11</a></td>
                <td><a href="#">Рубли</a></td>
                <td><a href="#">Русский</a></td>
                <td>
                    <div class="d-flex">
                        <a href="#" role="button" class="ml-1" style="font-size: inherit;">
                            @include('Html::admin.components.icons.trash')
                        </a>
                        <a href="#" role="button" class="ml-1" style="font-size: inherit;">
                            @include('Html::admin.components.icons.trash')
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="selected-2">
                        <input type="checkbox" id="selected-2" name="selected[]" value="2">
                    </label>
                </td>
                <th scope="row"><a href="#">2</a></th>
                <td><a href="#">Включён</a></td>
                <td><a href="#">Орлов Дмитрий Алесандрович</a></td>
                <td><a href="#">cvaize@gmail.com</a></td>
                <td><a href="#">11.11.1111 11:11:11</a></td>
                <td><a href="#">Рубли</a></td>
                <td><a href="#">Русский</a></td>
                <td>
                    <div class="d-flex">
                        <a href="#" role="button" class="ml-1" style="font-size: inherit;">
                            @include('Html::admin.components.icons.trash')
                        </a>
                        <a href="#" role="button" class="ml-1" style="font-size: inherit;">
                            @include('Html::admin.components.icons.trash')
                        </a>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </figure>
    <nav class="d-flex justify-content-center mb-3">
        <ul style="--nav-element-spacing-horizontal: 0.1rem;">
            <li><a href="#" role="button">1</a></li>
            <li><a href="#" role="button">2</a></li>
            <li><a href="#" role="button">3</a></li>
            <li><a href="#" role="button">4</a></li>
        </ul>
    </nav>
    <div class="d-flex justify-content-center">
        <div>
            <label for="per_page">
                <select id="per_page" name="per_page">
                    <option value="20" selected>20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                </select>
            </label>
        </div>
    </div>
@endsection
