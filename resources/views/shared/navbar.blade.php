<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/"> {{ config('app.name') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class='nav-item {{ Route::is('account.*') ? 'active' : '' }}'>
                    <a class='nav-link' href='{{ route('account.index') }}'>
                        <i class='fa fa-users'></i>
                        Akun
                    </a>
                </li>

                <li class='nav-item {{ Route::is('user.*') ? 'active' : '' }}'>
                    <a class='nav-link' href='{{ route('user.index') }}'>
                        <i class='fa fa-wrench'></i>
                        Admin
                    </a>
                </li>
            </div>

            @auth
            <div class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <form method='POST' action='{{ route('logout') }}' class="d-inline-block">
                            @csrf
                        
                            <button class="btn btn-default">
                                <i class="fa fa-sign-out"></i>
                                Keluar
                            </button>
                        </form>
                    </div>
                </li>
            </div>
            @endauth
        </div>
    </div>
</nav>