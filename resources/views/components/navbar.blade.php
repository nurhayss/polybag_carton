<nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav d-flex align-items-center">
        <!-- Sidebar Toggle (Mobile) -->
        <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="#" data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu">
                <i class="ti ti-menu-2 fs-5"></i>
            </a>
        </li>


    </ul>

    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
        <ul class="navbar-nav flex-row align-items-center w-100">
            <li class="nav-item">
                <span class="navbar-text fw-bold ps-2 text-dark text-start">{{ strtoupper($slot) }}</span>
            </li>

            <div class="ms-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body d-flex flex-column align-items-center justify-content-center">
                            <p class="fw-bold mb-0 mt-3 text-dark">{{ $session->name }}</p>
                            @if ($session->role == 1)
                            <p class="text-muted">Merchandise</p>
                            @endif
                            @if ($session->role == 2)
                            <p class="text-muted">Follow Up</p>
                            @endif
                            @if ($session->role == 3)
                            <p class="text-muted">Purchasing</p>
                            @endif
                            <hr class="w-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger mx-1">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </div>
        </ul>

    </div>
</nav>