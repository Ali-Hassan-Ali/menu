<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" style="font-family: 'Cairo', 'sans-serif';" href="{{ route('dashboard.home') }}">S{{ setting('title') }}</a>

    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        {{--<!-- User Menu-->--}}
        {{--<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-flag fa-lg"></i></a>--}}
        {{--<ul class="dropdown-menu settings-menu dropdown-menu-left">--}}
        {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}
        {{--<li>--}}
        {{--<a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
        {{--{{ $properties['native'] }}--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--@endforeach--}}
        {{--</ul>--}}
        {{--</li>--}}

        {{--notification--}}


        {{--user menu--}}
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="page-login.html" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i>
                        @lang('dashboard.logout')
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                <i class="fa fa-flag fa-lg"></i>
            </a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                @php
                    $langs = ['ar', 'en'];
                @endphp
                @foreach($langs as $lang)
                <li>
                    <a class="dropdown-item" href="{{ route('change.lang', $lang) }}">
                        {{ trans('front.lang_'. $lang) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>

    </ul>
</header>