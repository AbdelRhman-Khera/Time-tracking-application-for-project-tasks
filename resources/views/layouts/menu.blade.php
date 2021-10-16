<li class="side-menus {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="far fa-calendar-alt"></i><span>Calendar</span>
    </a>
</li>

@if (Auth::user()->role_id == 1)

<li class="{{ Request::is('projects*') ? 'active' : '' }}">
    <a href="{{ route('projects.index') }}"><i class="fas fa-tasks"></i><span>@lang('models/projects.plural')</span></a>
</li>


<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}"><i class="fas fa-users"></i><span>@lang('models/users.plural')</span></a>
</li>
@endif


