<!DOCTYPE HTML>
<html lang="hu">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Forma-1')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
    </noscript>

    <style>
        #footer {
            padding: 1.5em 0;
            margin-bottom: 0;
        }

        html,
        body {
            height: 100%;
        }

        #page-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #page-wrapper>header {
            flex: 0 0 auto;
        }

        #page-wrapper>article {
            flex: 1 0 auto;
        }

        #page-wrapper>footer {
            flex: 0 0 auto;
        }

        #header nav>ul {
            display: flex;
            align-items: center;
        }

        #header nav ul li.header-logout-item {
            display: flex;
            align-items: center;
            margin-left: 1.5em;
        }


        .header-logout-form {
            margin: 0;
            display: inline-block;
        }

        .header-logout-button {
            display: inline-block;
            padding: 0.3em 0.85em;
            line-height: 1.4;
            font-size: 0.8rem;
            border-radius: 4px;
            border: 1px solid rgba(0, 0, 0, 0.15);
            background: rgba(0, 0, 0, 0.03);
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-weight: 600;
            cursor: pointer;
            white-space: nowrap;
        }

        .header-logout-button:hover {
            background: rgba(0, 0, 0, 0.08);
            border-color: rgba(0, 0, 0, 0.25);
            color: #333;
        }

        .home-page .header-logout-button {
            background: rgba(0, 0, 0, 0.35);
            border-color: rgba(0, 0, 0, 0.55);
            color: #f5f5f5;
        }

        .home-page .header-logout-button:hover {
            background: rgba(0, 0, 0, 0.5);
            border-color: rgba(0, 0, 0, 0.8);
            color: #ffffff;
        }
    </style>

    @yield('head')
</head>

<body class="no-sidebar is-preload {{ request()->routeIs('home') ? 'home-page' : '' }}">
    <div id="page-wrapper">
        <header id="header" class="{{ request()->routeIs('home') ? 'alt' : '' }}">
            <h1 id="logo"><a href="{{ route('home') }}">Forma-1</a></h1>
            <nav id="nav">
                <ul>
                    <li class="{{ request()->routeIs('home') ? 'current' : '' }}">
                        <a href="{{ route('home') }}">Főoldal</a>
                    </li>
                    <li class="submenu">
                        <a href="#">Egyéb</a>
                        <ul>
                            <li class="{{ request()->routeIs('races.*') ? 'current' : '' }}">
                                <a href="{{ route('races.index') }}">Versenyek</a>
                            </li>
                            <li class="{{ request()->routeIs('pilots.*') ? 'current' : '' }}">
                                <a href="{{ route('pilots.index') }}">Pilóták</a>
                            </li>
                            <li class="{{ request()->routeIs('diagram.*') ? 'current' : '' }}">
                                <a href="{{ route('diagram.index') }}">Diagram</a>
                            </li>
                            <li class="{{ request()->routeIs('contact.*') ? 'current' : '' }}">
                                <a href="{{ route('contact.form') }}">Kapcsolat</a>
                            </li>
                            @auth
                            @if(in_array(auth()->user()->role, ['user', 'admin']))
                            <li class="{{ request()->routeIs('messages.*') ? 'current' : '' }}">
                                <a href="{{ route('messages.index') }}">Üzenetek</a>
                            </li>
                            @endif
                            @endauth
                            @auth
                            @if(auth()->user()->role === 'admin')
                            <li class="{{ request()->routeIs('admin.*') ? 'current' : '' }}">
                                <a href="{{ route('admin.index') }}">Admin</a>
                            </li>
                            @endif
                            @endauth
                        </ul>
                    </li>
                    @auth
                    @if(in_array(auth()->user()->role, ['user', 'admin']))
                    <li class="header-logout-item">
                        <form method="POST" action="{{ route('logout') }}" class="header-logout-form">
                            @csrf
                            <button type="submit" class="header-logout-button">
                                Kijelentkezés ({{ auth()->user()->name }})
                            </button>
                        </form>
                    </li>
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="button small">Bejelentkezés</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="button primary small">Regisztráció</a>
                    </li>
                    @endif
                    @else
                    <li>
                        <a href="{{ route('login') }}" class="button small">Bejelentkezés</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="button primary small">Regisztráció</a>
                    </li>
                    @endauth
                </ul>
            </nav>
        </header>


        @hasSection('fullpage')
        @yield('fullpage')
        @else
        <article id="main">
            <header class="special container">
                @yield('header')
            </header>

            <section class="wrapper @yield('wrapper_class', 'style4 container')">
                <div class="@yield('inner_class', 'content')">
                    @yield('content')
                </div>
            </section>
        </article>
        @endif

        <footer id="footer">
            <ul class="icons">
                <li>
                    <a href="#" class="icon brands circle fa-twitter">
                        <span class="label">Twitter</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-facebook-f">
                        <span class="label">Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-google-plus-g">
                        <span class="label">Google+</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-github">
                        <span class="label">Github</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="icon brands circle fa-dribbble">
                        <span class="label">Dribbble</span>
                    </a>
                </li>
            </ul>

            <ul class="copyright">
                <li>&copy; {{ date('Y') }} Forma-1</li>
                <li>
                    Design:
                    <a href="http://html5up.net" target="_blank" rel="noopener">HTML5 UP</a>
                </li>
            </ul>
        </footer>

    </div> {{-- #page-wrapper zárása --}}

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dropotron.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrolly.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollex.min.js') }}"></script>
    <script src="{{ asset('assets/js/browser.min.js') }}"></script>
    <script src="{{ asset('assets/js/breakpoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/util.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @yield('scripts')
</body>

</html>