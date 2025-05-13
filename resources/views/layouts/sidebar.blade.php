<nav class="navbar-vertical navbar">
    <div class="vh-100" data-simplebar>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/tpl/assets/images/brand/logo/logo-inverse.svg') }}" alt="Logo">
        </a>
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                    <i class="nav-icon fe fe-home me-2"></i> Beranda
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#navMasterData"
                    aria-expanded="{{ Request::is('users*', 'roles*', 'permissions*') ? 'true' : 'false' }}"
                    aria-controls="navMasterData">
                    <i class="nav-icon fe fe-database me-2"></i>
                    Data Master
                </a>
                <div id="navMasterData"
                    class="collapse {{ Request::is('users*', 'roles*', 'permissions*') ? 'show' : '' }}"
                    data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('users.index') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">
                                Kelola Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('roles.index') ? 'active' : '' }}"
                                href="{{ route('roles.index') }}">
                                Kelola Roles
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('roles.assigned') ? 'active' : '' }}"
                                href="{{ route('roles.assigned') }}">
                                Assigned Role
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('roles.assign') ? 'active' : '' }}"
                                href="{{ route('roles.assign') }}">
                                Assign Role
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::is('permissions.index') ? 'active' : '' }}"
                                href="{{ route('permissions.index') }}">
                                Kelola Permissions
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
