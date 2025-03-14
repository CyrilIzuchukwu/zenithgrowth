@extends('layout.user')
@section('content')



<!-- <div class="dashboard-main-body">

    @if(session('deposit_details'))
    <p>Plan ID: {{ session('deposit_details.plan_id') }}</p>
    <p>Wallet: {{ session('deposit_details.wallet_id') }}</p>
    <p>Amount: {{ session('deposit_details.amount_deposited') }}</p>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <label for="proof">Upload Payment Proof:</label>
        <input type="file" name="proof" id="proof" required>
        <button type="submit">Submit</button>
    </form>
    @else
    <p>No deposit details found.</p>
    @endif

</div> -->

<div class="dashboard-main-body">

    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Dashboard</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('user_dashboard') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Confirm Deposit
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white"></li>
        </ul>
    </div>

    <div class="gap-6 grid grid-cols-1 2xl:grid-cols-12">
        <div class="col-span-12 2xl:col-span-8">
            <div class="gap-6 grid grid-cols-1 sm:grid-cols-12">
                <div class="col-span-12">
                    <div
                        class="nft-promo-card card border-0 rounded-xl overflow-hidden relative z-1 py-6 3xl:px-[76px] 2xl:px-[56px] xl:px-[40px] lg:px-[28px] px-4">
                        <img src="admin_assets/images/nft/nft-gradient-bg.png" class="absolute start-0 top-0 w-full h-full z-[1]"
                            alt="">
                        <div
                            class="nft-promo-card__inner flex 3xl:gap-[80px] 2xl:gap-[48px] xl:gap-[32px] lg:gap-6 gap-4 items-center relative z-[1]">
                            <div class="nft-promo-card__thumb w-full">
                                <img src="admin_assets/images/nft/nf-card-img.png" alt="" class=" h-full object-fit-cover">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-4 text-white">Please Confirm Your Deposit</h6>
                                <p class="text-white text-base">Steps to make a deposit:</p>
                                <h5></h5>
                                <ol type="1" class="text-white">
                                    <li>1. Copy any of company's wallet address</li>
                                    <li>2. Pay the exact amount generated into the provided wallet address.</li>
                                    <li>3. After successful payment, screenshot the proof of your payment and attach
                                        it in the space provided.</li>
                                    <li>4. Then Click on save deposit and the system will automatically detect your
                                        payment.</li>
                                </ol>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-12">
                    <h6 class="mb-4">Company's Wallet Addresses</h6>
                    <div class="">
                        <div class="relative overflow-x-auto">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wallets as $wallet)
                                    <tr>
                                        <td class="text-center">{{ $wallet->crypto_name }}</td>
                                        <td class="text-center">{{ $wallet->wallet_address }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-span-12 lg:col-span-10 xl:col-span-12 2xl:col-span-6 2xl:col-start-4">
                    <div class="card border border-neutral-200 dark:border-neutral-600">
                        <div class="card-body">
                            <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4">Proof of payment</h6>

                            <form action="{{ route('deposit.submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-5">
                                    <label for="proof" class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Screenshot <span class="text-danger-600">*</span></label>
                                    <input type="file" name="proof" class="form-control rounded-lg" id="proof" placeholder="Proof">
                                    <span class="text-danger">@error('proof'){{ $message }} @enderror</span>
                                </div>
                                <div class="flex items-center justify-center gap-3">
                                    <button type="button" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-base px-14 py-[11px] rounded-lg">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>

</div>

@endsection