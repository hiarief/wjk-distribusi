<aside class="main-sidebar sidebar-dark-warning elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link text-sm">
        <img src="{{ URL::asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{--  <div class="user-panel d-flex mt-2 mb-2 pb-2">
            <div class="image">
                <img src="{{ URL::asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{!! Auth::user()->name !!}</a>
                <small class="text-warning">
                    Sebagai : {{ Auth::user()->roles->pluck('name')[0] ?? '' }}
                </small>
            </div>
        </div>  --}}

        <div class="form-inline d-flex mt-2 mb-2 pb-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar form-control-sm" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar btn-sm">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>



        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-flat nav-child-indent nav-collapse-hide-child text-sm"
                data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('siode.dashboard.index') }}" class="nav-link {!! request()->is(['siode/dashboard']) || request()->is(['siode/dashboard/*']) ? 'active' : '' !!}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {!! request()->is(['permissions', 'roles', 'users']) || request()->is(['permissions/*', 'roles/*', 'users/*'])
                    ? 'menu-open'
                    : '' !!}">
                    <a href="#" class="nav-link {!! request()->is(['permissions', 'roles', 'users']) || request()->is(['permissions/*', 'roles/*', 'users/*'])
                        ? 'active'
                        : '' !!}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Admin
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link {!! request()->is(['permissions']) || request()->is(['permissions/*']) ? 'active' : '' !!}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link {!! request()->is(['roles']) || request()->is(['roles/*']) ? 'active' : '' !!}">
                                <i class="far fa-circle nav-icon text-warning"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {!! request()->is(['users']) || request()->is(['users/*']) ? 'active' : '' !!}">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
