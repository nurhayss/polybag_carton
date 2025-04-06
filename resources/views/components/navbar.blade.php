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
                {{-- <li class="nav-item">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                        <i class="ti ti-bell-ringing"></i>
                        <div class="notification bg-primary rounded-circle"></div>
                    </a>
                </li> --}}
                <li class="nav-item dropdown ">
                    <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user fs-5"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up p-3 text-center shadow-lg "
                        aria-labelledby="drop2" style="min-width: 200px;">
                        <div class="mb-2">
                            <i class="fa-solid fa-circle-user fa-2x text-primary mb-2"></i>
                            <p class="fw-semibold mb-0 text-dark">{{ $session->name }}</p>
                            @if ($session->role == 1)
                            <small class="text-muted">Merchandise</small>
                            @elseif ($session->role == 2)
                            <small class="text-muted">Follow Up</small>
                            @elseif ($session->role == 3)
                            <small class="text-muted">Purchasing</small>
                            @endif
                        </div>
                        <hr>
                        <form action="{{ route('logout') }}" method="POST" class="w-100">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
                        </form>
                    </div>
                </li>

            </div>
        </ul>

    </div>
</nav>