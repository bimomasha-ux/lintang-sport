
<div class="offcanvas offcanvas-start mobile-sidebar"
     tabindex="-1"
     id="mobileSidebar"
     aria-labelledby="mobileSidebarLabel">

    {{-- HEADER --}}
    <div class="offcanvas-header mobile-sidebar-header">

        <h5 class="mobile-sidebar-title"
            id="mobileSidebarLabel">
            MENU UTAMA
        </h5>

        <button type="button"
                class="mobile-sidebar-close"
                data-bs-dismiss="offcanvas"
                aria-label="Tutup">

            <i class="bi bi-x-lg"></i>

        </button>

    </div>


    {{-- MENU --}}
    <div class="offcanvas-body mobile-sidebar-body">

        <div class="mobile-sidebar-menu">

            <a href="{{ route('dashboard.admin') }}"
               class="mobile-sidebar-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2"></i>
                <span>Dashboard</span>

            </a>


            <a href="{{ route('bookings.index') }}"
               class="mobile-sidebar-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">

                <i class="bi bi-calendar-check"></i>
                <span>Booking</span>

            </a>


            <a href="{{ route('patients.index') }}"
               class="mobile-sidebar-link {{ request()->routeIs('patients.*') ? 'active' : '' }}">

                <i class="bi bi-people"></i>
                <span>Pelanggan</span>

            </a>


            <a href="{{ route('services.index') }}"
               class="mobile-sidebar-link {{ request()->routeIs('services.*') ? 'active' : '' }}">

                <i class="bi bi-activity"></i>
                <span>Layanan</span>

            </a>


            <a href="{{ route('laporan') }}"
               class="mobile-sidebar-link {{ request()->routeIs('laporan') ? 'active' : '' }}">

                <i class="bi bi-bar-chart"></i>
                <span>Laporan</span>

            </a>

        </div>


        {{-- ADMIN & LOGOUT DI BAWAH --}}
        <div class="mobile-sidebar-account">

            {{-- ADMIN --}}
            <div class="mobile-admin-profile">

                <div class="mobile-admin-avatar">
                    A
                </div>

                <div class="mobile-admin-info">
                    <span class="mobile-admin-label">
                        Login sebagai
                    </span>

                    <span class="mobile-admin-name">
                        Admin
                    </span>
                </div>

            </div>


            {{-- LOGOUT --}}
            <form method="POST"
                  action="{{ route('logout') }}"
                  class="mobile-logout-form">

                @csrf

                <button type="submit"
                        class="mobile-logout-btn">

                    <i class="bi bi-box-arrow-right"></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </div>

</div>
