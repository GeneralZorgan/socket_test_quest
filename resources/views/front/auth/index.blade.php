@extends('layouts.auth')

@section('content')
    <div class="form-signin">
        @include('front.auth.parts.tabs_header')

        @include('front.auth.parts.tabs_content')

        @auth
            <div class="mt-2">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="mb-0">Вы уже авторизованы - <a href="{{ route('login') }}">Войти</a></p>
                    </div>
                </div>
            </div>
        @endauth

    </div>
@endsection
