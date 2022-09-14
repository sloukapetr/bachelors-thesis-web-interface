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
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-base-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-base-200 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl leading-tight text-base-content">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="max-w-7xl mx-auto py-6 md:px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                </div>
                <div class="flex justify-center my-2">
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
                <div class="w-full p-2 text-xs text-base-content/60 text-center">
                    <div>{{ __('Powered by') }} <a href="//laravel.com/docs/9.x" target="_blank" class="link link-secondary">Laravel</a> v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</div>
                    <div>{{ __('This page took') }} {{ round(((microtime(true) - LARAVEL_START)), 2) }} {{ __('seconds to render') }}.</div>
                </div>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
