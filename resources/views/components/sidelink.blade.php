<li class="sidebar-item {{ request()->routeIs($route) ? 'active' : '' }}">
    <a class="sidebar-link" href="{{ route($route) }}" aria-expanded="false">
        <span>
            <iconify-icon icon="{{ $icon }}" class="fs-6"></iconify-icon>
        </span>
        <span class="hide-menu">{{ $label }}</span>
    </a>
</li>