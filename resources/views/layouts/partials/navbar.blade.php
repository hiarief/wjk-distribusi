<header class="bg-dark p-3 text-white">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start flex-wrap">
            <a href="/" class="d-flex align-items-center mb-lg-0 text-decoration-none mb-2 text-white">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0 mb-2">
                <li><a href="{{ route('home.index') }}" class="nav-link px-2 text-white">Home</a></li>
                @auth
                    @role('admin')
                        @can('users.index')
                            <li><a href="{{ route('users.index') }}" class="nav-link px-2 text-white">Users</a></li>
                        @endcan
                        <li><a href="{{ route('roles.index') }}" class="nav-link px-2 text-white">Roles</a></li>
                        <li><a href="{{ route('permissions.index') }}" class="nav-link px-2 text-white">Permissions</a></li>
                    @endrole
                    <li><a href="{{ route('posts.index') }}" class="nav-link px-2 text-white">Posts</a></li>
                @endauth
            </ul>

            <form class="col-12 col-lg-auto mb-lg-0 me-lg-3 mb-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..."
                    aria-label="Search">
            </form>

            @auth
                {{ auth()->user()->name }}&nbsp;
                <div class="text-end">
                    <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">Logout</a>
                </div>
            @endauth

            @guest
                <div class="text-end">
                    <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Login</a>
                    <a href="{{ route('register.perform') }}" class="btn btn-warning">Sign-up</a>
                </div>
            @endguest
        </div>
    </div>
</header>
