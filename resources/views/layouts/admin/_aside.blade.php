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
            <a class="app-menu__item {{ request()->routeIs('dashboard.home') ? 'active' : '' }}" href="{{ route('dashboard.home') }}">
                <i class="app-menu__icon fa fa-home"></i> <span class="app-menu__label">@lang('dashboard.home')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('dashboard.sliders.*') ? 'active' : '' }}" href="{{ route('dashboard.sliders.index') }}">
                <i class="app-menu__icon fa fa-sliders"></i> <span class="app-menu__label">@lang('dashboard.sliders')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('dashboard.products.*') ? 'active' : '' }}" href="{{ route('dashboard.products.index') }}">
                <i class="app-menu__icon fa fa-sliders"></i> <span class="app-menu__label">@lang('dashboard.products')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('dashboard.categorys.*') ? 'active' : '' }}" href="{{ route('dashboard.categorys.index') }}">
                <i class="app-menu__icon fa fa-list-alt"></i> <span class="app-menu__label">@lang('dashboard.categorys')</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ request()->routeIs('dashboard.sub_categorys.*') ? 'active' : '' }}" href="{{ route('dashboard.sub_categorys.index') }}">
                <i class="app-menu__icon fa fa-list-alt"></i> <span class="app-menu__label">@lang('dashboard.sub_categorys')</span>
            </a>
        </li>

                {{--settings--}}
        
        <li class="treeview {{ request()->is('*settings*') ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">@lang('settings.settings')</span><i class="treeview-indicator fa fa-angle-right"></i></a>

            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('dashboard.settings.index') }}">
                    <i class="icon fa fa-circle-o"></i>@lang('settings.general')</a></li>
            </ul>
        </li>


        {{--profile--}}
        <li class="treeview {{ request()->is('*profile*') || request()->is('*password*')  ? 'is-expanded' : '' }}"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">@lang('dashboard.profile')</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ route('dashboard.profile.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('dashboard.edit_profile')</a></li>
                <li><a class="treeview-item" href="{{ route('dashboard.profile.password.edit') }}"><i class="icon fa fa-circle-o"></i>@lang('dashboard.change_password')</a></li>
            </ul>
        </li>

    </ul>{{-- app-menu --}}

    
</aside>
