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
                <a href="{{ route('admin_dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:ai-brain-03" class="menu-icon"></iconify-icon>
                    <span>Wallet</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('create_wallet') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Add Wallet</a>
                    </li>
                    <li>
                        <a href="{{ route('wallet.index') }}"><i class="ri-circle-fill circle-icon text-warning-600 w-auto"></i> Wallet List</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:invoice-03" class="menu-icon"></iconify-icon>
                    <span>Plans</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('create_plan') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Add Plan</a>
                    </li>
                    <li>
                        <a href="{{ route('plan.list') }}"><i class="ri-circle-fill circle-icon text-warning-600 w-auto"></i> Plan List</a>
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
                        <a href="{{ route('user.index') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Users List</a>
                    </li>
                    <li>
                        <a href=""><i class="ri-circle-fill circle-icon text-info-600 w-auto"></i> Add User</a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:bitcoin-circle" class="menu-icon"></iconify-icon>
                    <span>Deposits</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.deposits.pending') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pending deposits</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.deposits.approved') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Approved deposits</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="hugeicons:money-send-square" class="menu-icon"></iconify-icon>
                    <span>Withdrawals</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href=""><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Pending withdrawals</a>
                    </li>

                    <li>
                        <a href=""><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Approved withdrawals</a>
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
                        <a href=""><i class="ri-circle-fill circle-icon text-warning-600 w-auto"></i>
                            Notification</a>
                    </li>
                    <li>
                        <a href=""><i class="ri-circle-fill circle-icon text-info-600 w-auto"></i>
                            Profile</a>
                    </li>

                    <li>
                        <a href=""><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Logout</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</aside>