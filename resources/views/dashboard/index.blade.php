@extends('layout.user')
@section('content')



<div class="dashboard-main-body">
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Dashboard</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="index.html" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">AI</li>
        </ul>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5 gap-6">
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-purple-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Subscription</p>
                        <h6 class="mb-0 dark:text-white">15,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-purple-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="font-medium text-sm text-neutral-600 dark:text-white mt-3 mb-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-danger-600 dark:text-danger-400"><iconify-icon icon="bxs:down-arrow" class="text-xs"></iconify-icon> -800</span>
                    Last 30 days subscription
                </p>
            </div>
        </div><!-- card end -->
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-success-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Income</p>
                        <h6 class="mb-0 dark:text-white">$42,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-success-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="font-medium text-sm text-neutral-600 dark:text-white mt-3 mb-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-success-600 dark:text-success-400"><iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +$20,000</span>
                    Last 30 days income
                </p>
            </div>
        </div><!-- card end -->
        <div class="card shadow-none border border-gray-200 dark:border-neutral-600 dark:bg-neutral-700 rounded-lg h-full bg-gradient-to-r from-red-600/10 to-bg-white">
            <div class="card-body p-5">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="font-medium text-neutral-900 dark:text-white mb-1">Total Expense</p>
                        <h6 class="mb-0 dark:text-white">$30,000</h6>
                    </div>
                    <div class="w-[50px] h-[50px] bg-red-600 rounded-full flex justify-center items-center">
                        <iconify-icon icon="fa6-solid:file-invoice-dollar" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="font-medium text-sm text-neutral-600 dark:text-white mt-3 mb-0 flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 text-success-600 dark:text-success-400"><iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +$5,000</span>
                    Last 30 days expense
                </p>
            </div>
        </div><!-- card end -->
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 mt-6">
        <div class="xl:col-span-12 2xl:col-span-6">
            <div class="card h-full rounded-lg border-0">
                <div class="card-body">
                    <div class="flex flex-wrap items-center justify-between">
                        <h6 class="text-lg mb-0">Sales Statistic</h6>
                        <select class="form-select bg-white dark:bg-neutral-700 form-select-sm w-auto">
                            <option>Yearly</option>
                            <option>Monthly</option>
                            <option>Weekly</option>
                            <option>Today</option>
                        </select>
                    </div>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        <h6 class="mb-0">$27,200</h6>
                        <span class="text-sm font-semibold rounded-full bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 border border-success-200 dark:border-success-600/50 px-2 py-1.5 line-height-1 flex items-center gap-1">
                            10% <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                        </span>
                        <span class="text-xs font-medium">+ $1400 Per Day</span>
                    </div>
                    <div id="chart" class="pt-[28px] apexcharts-tooltip-style-1"></div>
                </div>
            </div>
        </div>
        <div class="xl:col-span-12 2xl:col-span-9">
            <div class="card h-full border-0">
                <div class="card-body p-6">

                    <div class="mb-4">
                        <ul class="tab-style-gradient flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                            <li class="" role="presentation">
                                <button class="py-2.5 px-4 border-t-2 font-semibold text-lg inline-flex items-center gap-3 text-neutral-600" id="registered-tab" data-tabs-target="#registered" type="button" role="tab" aria-controls="registered" aria-selected="false">
                                    Latest Registered
                                    <span class="text-white px-2 py-0.5 bg-neutral-600 rounded-full text-sm">20</span>
                                </button>
                            </li>
                            <li class="" role="presentation">
                                <button class="py-2.5 px-4 border-t-2 font-semibold text-lg inline-flex items-center gap-3 text-neutral-600 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="subscribe-tab" data-tabs-target="#subscribe" type="button" role="tab" aria-controls="subscribe" aria-selected="false">
                                    Latest Subscribe
                                    <span class="text-white px-2 py-0.5 bg-neutral-600 rounded-full text-sm">20</span>
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div id="default-tab-content">
                        <div class="hidden" id="registered" role="tabpanel" aria-labelledby="registered-tab">
                            <div class="overflow-x-auto">
                                <table class="table bordered-table sm-table mb-0 table-auto">
                                    <thead>
                                        <tr>
                                            <th scope="col">Users </th>
                                            <th scope="col">Registered On</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user1.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Dianne Russell</h6>
                                                        <span class="text-sm text-secondary-light font-medium">redaniel@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Free</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user2.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Wade Warren</h6>
                                                        <span class="text-sm text-secondary-light font-medium">xterris@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Basic</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user3.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Albert Flores</h6>
                                                        <span class="text-sm text-secondary-light font-medium">seannand@mail.ru</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Standard</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user4.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Bessie Cooper </h6>
                                                        <span class="text-sm text-secondary-light font-medium">igerrin@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Business</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user5.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Arlene McCoy</h6>
                                                        <span class="text-sm text-secondary-light font-medium">fellora@mail.ru</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Enterprise </td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="hidden" id="subscribe" role="tabpanel" aria-labelledby="subscribe-tab">
                            <div class="overflow-x-auto">
                                <table class="table bordered-table sm-table mb-0 table-auto">
                                    <thead>
                                        <tr>
                                            <th scope="col">Users Name </th>
                                            <th scope="col">Registered On</th>
                                            <th scope="col">Plan</th>
                                            <th scope="col" class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user1.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Dianne Russell</h6>
                                                        <span class="text-sm text-secondary-light font-medium">redaniel@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Free</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user2.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Wade Warren</h6>
                                                        <span class="text-sm text-secondary-light font-medium">xterris@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Basic</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user3.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Albert Flores</h6>
                                                        <span class="text-sm text-secondary-light font-medium">seannand@mail.ru</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Standard</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user4.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Bessie Cooper </h6>
                                                        <span class="text-sm text-secondary-light font-medium">igerrin@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Business</td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="flex items-center">
                                                    <img src="admin_assets/images/users/user5.png" alt="" class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                                    <div class="grow">
                                                        <h6 class="text-base mb-0 font-medium">Arlene McCoy</h6>
                                                        <span class="text-sm text-secondary-light font-medium">fellora@mail.ru</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>27 Mar 2024</td>
                                            <td>Enterprise </td>
                                            <td class="text-center">
                                                <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection