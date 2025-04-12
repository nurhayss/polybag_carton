<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img style="height: 50px;width: 50px" src="{{ asset('assets/images/logo-polybag.png') }}" alt="" />
                <span class="text-dark fw-bold">PT Sansan Saudaratex Jaya</span>
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">MAIN MENU</span>
                </li>
                <x-sidelink route="index" icon="solar:home-smile-bold-duotone" label="Dashboard" />

                @if ($session->role == 1)
                <x-sidelink route="new-form" icon="solar:file-text-bold-duotone" label="Order Form" />
                @endif
                {{--
                <x-sidelink route="a" icon="solar:danger-circle-bold-duotone" label="Alerts" />
                <x-sidelink route="a" icon="solar:bookmark-square-minimalistic-bold-duotone" label="Card" />
                <x-sidelink route="a" icon="solar:file-text-bold-duotone" label="Forms" />
                <x-sidelink route="a" icon="solar:text-field-focus-bold-duotone" label="Typography" /> --}}

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">ACCOUNT PAGES</span>
                </li>
                <x-sidelink route="account-page" icon="solar:user-circle-bold-duotone" label="Account" />

            </ul>
        </nav>
    </div>
</aside>