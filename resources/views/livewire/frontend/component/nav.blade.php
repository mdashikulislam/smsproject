<div>
    <div class="d-flex align-items-center">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <div class="ms-2">
            <div class="fw-bold">{{$user->name}}</div>
            <div class="text-muted"><small>£{{$user->available_balance}}</small></div>
        </div>
        <!-- Dropdown Menu -->
        <div class="dropdown text-end ms-3">
            <ul class="dropdown-menu text-small">
                <li><a class="dropdown-item" href="#">Reset Password</a></li>
                <li><a class="dropdown-item" wire:navigate href="{{route('reload')}}">Reload balance</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                @livewire('auth.logout')
            </ul>
        </div>
    </div>
</div>
