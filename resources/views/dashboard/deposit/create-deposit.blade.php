@extends('layout.user')
@section('content')

<div class="dashboard-main-body">
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Plan Information</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('user_dashboard') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Deposit</li>
        </ul>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="card h-full p-0 rounded-xl border-0">

                <div class="card-body p-6">
                    <div class="relative overflow-x-auto">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" class="text-center">Plan name</th>
                                    <th scope="col" class="text-center">($) Minimum deposit</th>
                                    <th scope="col" class="text-center">($) Maximum deposit</th>
                                    <th scope="col" class="text-center"> Interest Rate</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($plans as $index => $plan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-center">{{ ucfirst($plan->name) }}</td>
                                    <td class="text-center">{{ number_format($plan->minimum_amount, 2) }}</td>
                                    <td class="text-center">{{ number_format($plan->maximum_amount, 2) }}</td>
                                    <td class="text-center">{{ $plan->interest_rate }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- deposit form  -->
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">

    </div>

    <div class="card h-full rounded-lg border-0">
        <div class="card-body p-10">

            <p class="mb-5">Choose An Investment Plan to Deposit</p>

            <form action="{{ route('user.make-deposit') }}" method="post">
                @csrf

                <div class="grid md:grid-cols-2 gap-x-5">
                    <div class="mb-5">
                        <label for="country" class="text-sm font-semibold mb-2 block text-neutral-900 dark:text-white">Select Package
                            <span class="text-danger-600">*</span> </label>
                        <select name="plan_id" class="form-control rounded-lg" id="country">
                            <option selected disabled>Choose Package</option>
                            @foreach($plans as $plan)
                            <option value="{{ $plan->id }}" {{ old('plan_id') == $plan->id ? 'selected' : '' }}>
                                {{ ucfirst($plan->name) }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger" style="display: block;">@error('plan_id'){{ $message }} @enderror</span>
                    </div>

                    <div class="mb-5">
                        <label for="country" class="text-sm font-semibold mb-2 block text-neutral-900 dark:text-white">Select Payment Method
                            <span class="text-danger-600">*</span> </label>
                        <select name="wallet_id" class="form-control rounded-lg" id="country">
                            <option selected disabled>Choose Payment Method</option>
                            @foreach($wallets as $wallet)
                            <option value="{{ $wallet->id }}" {{ old('wallet_id') == $wallet->id ? 'selected' : '' }}>
                                {{ ucfirst($wallet->crypto_name) }}
                            </option>
                            @endforeach
                        </select>
                        <span class="text-danger" style="display: block;">@error('wallet_id'){{ $message }} @enderror</span>
                    </div>

                    <div class="mb-5">
                        <label for="amount" class="text-sm font-semibold mb-2 block text-neutral-900 dark:text-white"> Amount
                            <span class="text-danger-600">*</span></label>
                        <input type="text" name="amount" value="{{ old('amount') }}" class="form-control rounded-lg" id="amount" placeholder="Amount ">
                    </div>

                    <div class="col-span-2 flex items-center justify-center gap-3 mt-6">
                        <button type="reset"
                            class="border border-danger-600 hover:bg-danger-200 text-danger-600 text-base px-10 py-[11px] rounded-lg">
                            Reset
                        </button>
                        <button type="submit"
                            class="btn btn-primary border border-primary-600 text-base px-6 py-3 !rounded-lg">
                            Continue
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection