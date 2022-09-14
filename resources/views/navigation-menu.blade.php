  <div class="navbar bg-base-300">
    <div class="navbar-start">
      <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-300 rounded-box w-52">
            @auth
                <li><a href="{{ route('dashboard') }}" class="@if (request()->routeIs('dashboard')) active @endif">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('rooms.index') }}" class="@if (request()->routeIs('rooms.index')) active @endif">{{ __('Rooms') }}</a></li>
                <li><a href="{{ route('users.index') }}" class="@if (request()->routeIs('users.index')) active @endif">{{ __('Users') }}</a></li>
                <li><a href="{{ route('about') }}" class="@if (request()->routeIs('about')) active @endif">{{ __('About') }}</a></li>
            @else
                <li><a href="{{ route('about') }}" class="@if (request()->routeIs('about')) active @endif">{{ __('About') }}</a></li>
            @endauth
        </ul>
      </div>
      <div class="font-semibold text-xl leading-tight text-base-content p-2">{{ config('app.name', 'Laravel') }}</div>
    </div>
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal p-0 space-x-2">
        @auth
        <li><a href="{{ route('dashboard') }}" class="@if (request()->routeIs('dashboard')) active @endif">{{ __('Dashboard') }}</a></li>
        <li><a href="{{ route('rooms.index') }}" class="@if (request()->routeIs('rooms.index')) active @endif">{{ __('Rooms') }}</a></li>
        <li><a href="{{ route('users.index') }}" class="@if (request()->routeIs('users.index')) active @endif">{{ __('Users') }}</a></li>
        <li><a href="{{ route('about') }}" class="@if (request()->routeIs('about')) active @endif">{{ __('About') }}</a></li>
    @else
        <li><a href="{{ route('about') }}" class="@if (request()->routeIs('about')) active @endif">{{ __('About') }}</a></li>
    @endauth
      </ul>
    </div>
    <div class="navbar-end">
        @auth
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost">
                    {{ Auth::user()->name }}
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-300 rounded-box w-52">
                    <li><a href="{{ route('profile.show') }}">{{ __('Profile') }}</a></li>
                    <hr class="border-base-content/[.6] hidden">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <li>
                            <a href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </a>
                        </li>
                    </form>
                </ul>
            </div>
        @else
            <ul class="menu menu-horizontal p-0 space-x-2">
                <li><a href="{{ route('login') }}" class="@if (request()->routeIs('login')) active @endif">{{ __('Log in') }}</a></li>
                @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="@if (request()->routeIs('register')) active @endif">{{ __('Register') }}</a></li>
                @endif
            </ul>
        @endauth
    </div>
  </div>
