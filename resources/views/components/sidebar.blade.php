<aside class="left-sidebar">
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo-light.svg') }}" alt="" />
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

                <x-sidelink route="new-form" icon="solar:file-text-bold-duotone" label="Order Form" />
                {{--
                <x-sidelink route="a" icon="solar:danger-circle-bold-duotone" label="Alerts" />
                <x-sidelink route="a" icon="solar:bookmark-square-minimalistic-bold-duotone" label="Card" />
                <x-sidelink route="a" icon="solar:file-text-bold-duotone" label="Forms" />
                <x-sidelink route="a" icon="solar:text-field-focus-bold-duotone" label="Typography" /> --}}

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                    <span class="hide-menu">ACCOUNT PAGES</span>
                </li>
                {{--
                <x-sidelink route="login" icon="solar:login-3-bold-duotone" label="Login" />
                <x-sidelink route="register" icon="solar:user-plus-rounded-bold-duotone" label="Register" /> --}}

            </ul>
        </nav>
    </div>
</aside>