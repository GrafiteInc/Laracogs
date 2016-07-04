        <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
        </a>

    <div id="menu" role="navigation">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#"  class="pure-menu-link"><span class="fa fa-cogs"> Brand</span></a>
            <ul class="pure-menu-list">
            @if (Auth::user())
                <li class="pure-menu-item"><a href="{!! url('dashboard') !!}" class="pure-menu-link""><span class="fa fa-dashboard"></span> Dashboard</a></li>
                <li class="pure-menu-item"><a href="{!! url('user/settings') !!}"  class="pure-menu-link"><span class="fa fa-user"></span> Settings</a></li>
                <li class="pure-menu-item"><a href="{!! url('teams') !!}"  class="pure-menu-link"><span class="fa fa-users"></span> Teams</a></li>
                <li class="sidebar-header"><span>Admin</span></li>
                <li class="pure-menu-item"><a href="{!! url('admin/users') !!}" class="pure-menu-link"><span class="fa fa-users"></span> Users</a></li>
                <li class="pure-menu-item"><a href="{!! url('admin/roles') !!}"  class="pure-menu-link"><span class="fa fa-lock"></span> Roles</a></li>
                <li class="pure-menu-item"><a href="#"  class="pure-menu-link">User:  {{ Auth::user()->name }}</a></li>
                <li class="pure-menu-item"><a href="/logout" class="pure-menu-link">Logout</a></li>
            @else
                <li class="pure-menu-item"><a href="/register" class="pure-menu-link">Register</a></li>
                <li class="pure-menu-item"><a href="/login"  class="pure-menu-link">Login</a></li>
            @endif
            </ul>
            <a class="pure-menu-link pure-menu-heading" href="#">&copy; {!! date('Y'); !!} Brand</a>
            @if (Session::get('original_user'))
            <a class="pure-menu-heading button-danger pure-menu-link" href="/users/switch-back">Switch Login</a>
            @endif

        </div>
    </div>
