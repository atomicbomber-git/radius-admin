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
        </div>
    </div>
</nav>