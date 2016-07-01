!-- Menu toggle -->
        <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
        </a>

    <div id="menu" role="navigation">
        <div class="pure-menu">
            <a class="pure-menu-heading" href="#"><span class="fa fa-cogs"></span> Brand</a>
            <ul class="pure-menu-list">
            @if (Auth::user())
                <li class="pure-menu-item"><a href="{!! url('dashboard') !!}"><span class="fa fa-dashboard"></span> Dashboard</a></li>
                <li class="pure-menu-item"><a href="{!! url('user/settings') !!}"><span class="fa fa-user"></span> Settings</a></li>
                <li class="pure-menu-item"><a href="{!! url('teams') !!}"><span class="fa fa-users"></span> Teams</a></li>
                <li class="sidebar-header"><span>Admin</span></li>
                <li class="pure-menu-item"><a href="{!! url('admin/users') !!}"><span class="fa fa-users"></span> Users</a></li>
                <li><a href="{!! url('admin/roles') !!}"><span class="fa fa-lock"></span> Roles</a></li>
                <li class="pure-menu-item"><a href="#">User:  {{ Auth::user()->name }}</a></li>
                <li class="pure-menu-item"><a href="/logout">Logout</a></li>
            @else
                <li class="pure-menu-item"><a href="/register">Register</a></li>
                <li class="pure-menu-item"><a href="/login">Login</a></li>
            @endif
            </ul>
            <a class="pure-menu-heading" href="#">&copy; {!! date('Y'); !!} Brand</a>
            @if (Session::get('original_user'))
            <a class="pure-menu-heading button-danger" href="/users/switch-back">Switch Login</a>
            @endif

        </div>
    </div>
