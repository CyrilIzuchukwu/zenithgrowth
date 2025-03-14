@extends('layout.user')
@section('content')

<div class="dashboard-main-body">

    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Deposit List</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('user_dashboard') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Deposit list</li>
        </ul>
    </div>


    <div class="grid grid-cols-1 3xl:grid-cols-12 gap-6 mt-6">

        <!-- Crypto Home Widgets Start -->
        <div class="2xl:col-span-12 3xl:col-span-8">
            <div class="grid grid-cols-1 3xl:grid-cols-12 gap-6">

                <div class="col-span-12">
                    <div class="card h-full border-0">
                        <div class="card-body p-6">
                            <div class="flex items-center flex-wrap gap-2 justify-between mb-5">
                                <h6 class="font-bold text-lg mb-0">Recent Deposit</h6>
                            </div>
                            <div class="table-responsive scroll-sm">
                                <table class="table bordered-table mb-0 xsm-table">
                                    <thead>
                                        <tr>
                                            <th class="col">#</th>
                                            <th class="col">Plan</th>
                                            <th class="col">Wallet</th>
                                            <th class="col">Amount</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deposits as $key => $deposit)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $deposit->plan->name }}</td>
                                            <td>{{ $deposit->wallet->crypto_name }}</td>
                                            <td class="">${{ number_format($deposit->amount_deposited, 2) }}</td>
                                            <td class="text-center">
                                                @if($deposit->status == 0)
                                                <span
                                                    class="bg-warning-100 dark:bg-warning-600/25 text-warning-600 dark:text-warning-400 px-4 py-1.5 rounded font-medium text-sm">Pending</span>
                                                @elseif($deposit->status == 1)
                                                <span
                                                    class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-4 py-1.5 rounded font-medium text-sm">Approved</span>
                                                @else
                                                <span
                                                    class="bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-dangerf-400 px-4 py-1.5 rounded font-medium text-sm">Rejected</span>

                                                @endif
                                            </td>
                                            <td>
                                                <span class="text-secondary-light text-sm"> {{ $deposit->created_at->format('d M Y') }}</span>
                                            </td>


                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-gray-500 p-4">No deposit history found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Crypto Home Widgets End -->
    </div>
</div>

@endsection