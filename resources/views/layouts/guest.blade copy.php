<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-base-content antialiased">
            <div class="navbar bg-base-100">
                <div class="flex-1 normal-case text-xl">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="flex-none">
                    <ul class="menu menu-horizontal p-0">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}">{{ __('Dashboard') }}</a></li>
                            @else
                                <li><a href="{{ route('login') }}">{{ __('Log in') }}</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
            <div class="mt-5">
                {{ $slot }}
            </div>
            <div class="flex justify-center my-5">
                <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">{{ __('Select theme') }}</span>
                </label>
                <select data-choose-theme class="select select-bordered select-sm">
                    <option value="">{{ __('Default') }}</option>
                    <option value="light">{{ __('Light') }}</option>
                    <option value="dark">{{ __('Dark') }}</option>
                </select>
                </div>
            </div>
        </div>
    </body>
</html>
