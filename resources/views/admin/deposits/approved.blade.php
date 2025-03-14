@extends('layout.admin')
@section('content')
<!-- <div class="card">
    <div class="card-header">
        <h4>Pending Deposits</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Email</th>
                        <th>Plan</th>
                        <th>Amount Deposited ($)</th>
                        <th>Payment Method</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deposits as $deposit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $deposit->user->name }}</td>
                        <td>{{ $deposit->user->email }}</td>
                        <td>{{ $deposit->plan->name }}</td>
                        <td>${{ number_format($deposit->amount_deposited, 2) }}</td>
                        <td>({{ $deposit->wallet->crypto_name }}) <br> {{ $deposit->wallet->wallet_address }}</td>
                        <td>{{ $deposit->created_at->format('d M, Y') }}</td>
                        <td>
                            <form action="{{ route('admin.approve.deposit', $deposit->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> -->

<div class="dashboard-main-body">

    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Pending Deposit</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Pending deposits</li>
        </ul>
    </div>

    <div class="grid grid-cols-1 2xl:grid-cols-12 gap-6">

        <!-- ================== Third Row Cards Start ======================= -->
        <div class="col-span-12 2xl:col-span-8">
            <div class="card border-0 h-full">
                <div class="card-header">
                    <div class="flex items-center flex-wrap gap-2 justify-between">
                        <h6 class="font-bold text-lg mb-0">Recent pending deposit</h6>
                    </div>
                </div>
                <div class="card-body p-6">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Plan</th>
                                    <th>Amount Deposited ($)</th>
                                    <th>Payment Method</th>
                                    <th>Date Approved</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deposits as $deposit)
                                <tr>
                                    <td>
                                        <span class="text-neutral-600">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>
                                        <span class="text-neutral-600">{{ $deposit->user->name }}</span>
                                    </td>
                                    <td>
                                        <span class="text-neutral-600">
                                            {{ $deposit->user->email }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="text-neutral-600">
                                            {{ $deposit->plan->name }}
                                        </span>
                                    </td>
                                    <td><span class="text-neutral-600">${{ number_format($deposit->amount_deposited, 2) }}</span></td>
                                    <td>
                                        <div class="text-neutral-600">
                                            <h6 class="text-base mb-0 font-normal">{{ $deposit->wallet->crypto_name }}</h6>
                                            <span class="text-sm font-normal">{{ $deposit->wallet->wallet_address }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-neutral-600">{{ $deposit->updated_at->format('d M, Y') }}</span>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ================== Third Row Cards End ======================= -->

    </div>

</div>

@endsection