<x-guest-layout>
    <x-jet-authentication-card>

        {{--
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        --}}

        <x-slot name="title">
            {{ __('Log in to application') }}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-control mb-2">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="name" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="form-control mb-2">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="form-control items-start">
                <x-jet-checkbox name="password" title="{{ __('Remember me') }}" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="link link-accent" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
