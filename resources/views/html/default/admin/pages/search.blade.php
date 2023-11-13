<?php
/**
 * @var \Illuminate\Support\Collection $users
 * @var \App\Models\User $user
 */
$users = $users ?? \Illuminate\Support\Collection::make([]);
?>
@extends('Html::admin.layouts.app', ['seo' => $seo ?? null])

@section('content')
    <h3>
        Поиск: {{ $frd['search'] ?? '' }}
    </h3>
    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('admin.users.edit', $user) }}">
                    {{ $user->name }} ({{ $user->email }})
                </a>
            </li>
        @endforeach
    </ul>
@endsection
