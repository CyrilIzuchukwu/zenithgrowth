<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="admin_assets/images/logo.png" alt="site logo" class="light-logo">
            <img src="admin_assets/images/logo-light.png" alt="site logo" class="dark-logo">
            <img src="admin_assets/images/logo-icon.png" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li class="">
                <a href="{{ route('user_dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.investments') }}">
                    <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>
                    <span>My Investments</span>
                </a>
            </li>

            <li>
                <a href="kanban.html">
                    <iconify-icon icon="material-symbols:map-outline" class="menu-icon"></iconify-icon>
                    <span>Kanban</span>
                </a>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:bitcoin-circle" class="menu-icon"></iconify-icon>
                    <span>Deposits</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('user.deposit') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>Deposit </a>
                    </li>
                    <li>
                        <a href="{{ route('user.deposit-history') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Deposit List
                        </a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:document-text-outline" class="menu-icon"></iconify-icon>
                    <span>Withdrawals</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="typography.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Withdrawal List</a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Users List</a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="icon-park-outline:setting-two" class="menu-icon"></iconify-icon>
                    <span>Settings</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('user.profile') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Profile</a>
                    </li>

                    <li>
                        <a href="{{ route('signout') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"></i> Logout</a>
                    </li>

                    <form action="{{ route('signout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                </ul>
            </li>


        </ul>
    </div>
</aside>