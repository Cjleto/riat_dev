<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('clienti.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-building') }}"></use>
            </svg>
            Clienti
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('modelli.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-print') }}"></use>
            </svg>
            Modelli
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('moduli.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-file') }}"></use>
            </svg>
            Moduli
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('nuovo_modulo') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-file') }}"></use>
            </svg>
            Nuovo Modulo
        </a>
    </li>

    <li class="nav-group {{ request()->is('admin/*') ? 'show' : '' }}" aria-expanded="{{ request()->is('admin/*') ? 'true' : 'false' }}">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-star') }}"></use>
            </svg>
            Impostazioni
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route("admin.users.index") }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user-plus') }}"></use>
                    </svg>
                    Utenti
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route("admin.permissions.index") }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-door') }}"></use>
                    </svg>
                    Permessi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route("admin.roles.index") }}" target="_top">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-list') }}"></use>
                    </svg>
                    Ruoli
                </a>
            </li>
        </ul>
    </li>
</ul>
