<nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}" wire:navigate>
            <img width="200" src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo-sales-board-white.png') }}" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item">
                    <a class="nav-link @if($page === 'Dashboard') active @endif " aria-current="page" href="{{ route('dashboard') }}" wire:navigate>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(in_array($page, ['List Users', 'Create new User'])) active @endif" href="{{ route('users.index') }}" wire:navigate>Users</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle @if(in_array($page, ['Profile', 'Change Password'])) active @endif " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item @if($page === 'Profile') active @endif" href="{{ route('user.profile') }}" wire:navigate>Profile</a></li>
                        <li><a class="dropdown-item @if($page === 'Change Password') active @endif" href="{{ route('user.change-password') }}" wire:navigate>Change password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
