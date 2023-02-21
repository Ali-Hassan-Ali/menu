<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar" style="::-webkit-scrollbar-track {box-shadow: inset 0 0 5px grey;border-radius: 10px;}">
    
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{ auth()->user()->image_path }}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ auth()->user()->name }}</p>
        </div>
    </div>

    <ul class="app-menu">

        <li>
            <a class="app-menu__item {{ request()->is('*dashboard*') ? 'active' : '' }}" href="{{ route('dashboard.home') }}">
                <i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('dashboard.home')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('*sliders*') ? 'active' : '' }}" href="{{ route('dashboard.sliders.index') }}">
                <i class="app-menu__icon fa fa-sliders"></i> <span class="app-menu__label">@lang('dashboard.sliders')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('*products*') ? 'active' : '' }}" href="{{ route('dashboard.products.index') }}">
                <i class="app-menu__icon fa fa-sliders"></i> <span class="app-menu__label">@lang('dashboard.products')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->is('*categorys*') ? 'active' : '' }}" href="{{ route('dashboard.categorys.index') }}">
                <i class="app-menu__icon fa fa-list-alt"></i> <span class="app-menu__label">@lang('dashboard.categorys')</span>
            </a>
        </li>

    </ul>{{-- app-menu --}}

    
</aside>
