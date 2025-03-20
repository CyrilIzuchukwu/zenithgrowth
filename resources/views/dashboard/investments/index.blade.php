@extends('layout.user')
@section('content')

<div class="dashboard-main-body">

    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Investment</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="index.html" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Latest Investment</li>
        </ul>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 mt-6">
        <div class="lg:col-span-12 2xl:col-span-6">
            <div class="card h-full border-0 overflow-hidden">
                <div
                    class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center justify-between">
                    <h6 class="text-lg font-semibold mb-0">Lastest Investments</h6>
                    <a href="javascript:void(0)"
                        class="text-primary-600 dark:text-primary-600 hover-text-primary flex items-center gap-1">
                        View All
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a>
                </div>
                <div class="card-body p-6">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table style-two mb-0">
                            <thead>
                                <tr>
                                    <th>Plan</th>
                                    <th>Amount Invested</th>
                                    <th>ROI (%)</th>
                                    <th>Profit</th>
                                    <th>Total Profit</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($investments as $investment)
                                <tr>
                                    <td>{{ $investment->plan->name ?? 'N/A' }}</td>
                                    <td>${{ number_format($investment->amount_invested, 2) }}</td>
                                    <td>{{ $investment->roi }}%</td>
                                    <td>${{ number_format($investment->profit, 2) }}</td>
                                    <td>${{ number_format($investment->total_profit, 2) }}</td>
                                    <td>{{ \Carbon\Carbon::parse($investment->start_date)->format('d M, Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($investment->end_date)->format('d M, Y') }}</td>
                                    <td>
                                        @if ($investment->due)
                                        <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Completed</span>
                                        @else
                                        <span class="bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($investment->due || \Carbon\Carbon::now()->greaterThanOrEqualTo($investment->end_date))
                                        <form action="{{ route('investments.withdraw', $investment->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">
                                                Withdraw
                                            </button>
                                        </form>
                                        @else
                                        <span class="bg-gray-300 text-gray-600 px-6 py-1.5 rounded-full font-medium text-sm">
                                            Not Due
                                        </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center text-danger">No investments found.</td>
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

@endsection