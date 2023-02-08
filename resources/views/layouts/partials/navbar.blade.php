<nav class="navbar navbar-dark navbar-expand-lg bg-body-tertiary bg-primary"
    style="position: {{ $title == 'welcome' ? 'absolute' : '' }};width: {{ $title == 'welcome' ? '100vw' : '100%' }}">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Amazing E-Grocery</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"></ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'home' ? 'active' : '' }}" aria-current="page"
                        href="../../../{{ app()->getLocale() }}/home" >{{ __('home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'cart' ? 'active' : '' }}" href="../../../{{ app()->getLocale() }}/cart">{{ __('cart') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'profile' ? 'active' : '' }}"
                        href="../../../{{ app()->getLocale() }}/profile">{{ __('profile') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title == 'history' ? 'active' : '' }}"
                        href="../../../{{ app()->getLocale() }}/history">{{ __('history') }}</a>
                </li>
                @auth
                    @if (auth()->user()->role_id == 2)
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'admin' ? 'active' : '' }}"
                                href="../../../{{ app()->getLocale() }}/admin">{{ __('adminNav') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $title == 'item' ? 'active' : '' }}"
                                href="../../../{{ app()->getLocale() }}/item">Item</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('lang') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../../../en{{substr(request()->getRequestUri(),3)}}"><i class="bi bi-layout-text-window-reverse"></i>
                                English</a>
                        </li>
                        <li><a class="dropdown-item" href="../../../id{{substr(request()->getRequestUri(),3) }}"><i class="bi bi-layout-text-window-reverse"></i>
                                Indonesian</a>
                        </li>
                    </ul>
                </li>
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger "><i class="fa-solid fa-right-from-bracket"></i>
                            {{ __('logout') }}</button>
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ $title == 'register' ? 'active' : '' }} " href="../../../{{ app()->getLocale() }}/register"><i
                                class="bi bi-box-arrow-in-right"></i> {{ __('register') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title == 'login' ? 'active' : '' }}" href="../../../{{ app()->getLocale() }}/login"><i
                                class="bi bi-box-arrow-in-right"></i> {{ __('login') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
