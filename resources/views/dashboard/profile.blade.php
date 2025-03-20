@extends('layout.user')
@section('content')

<div class="dashboard-main-body">
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">View Profile</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="index.html" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">View Profile</li>
        </ul>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-4">
            <div
                class="user-grid-card relative border border-neutral-200 dark:border-neutral-600 rounded-2xl overflow-hidden bg-white dark:bg-neutral-700 h-full">
                <!-- <img src="assets/images/user-grid/user-grid-bg1.png" alt="" class="w-full object-fit-cover"> -->
                <div class="pb-6 ms-6 mb-6 me-6 mt-[20px]">
                    <div class="text-center border-b border-neutral-200 dark:border-neutral-600">
                        <img src="{{ auth()->user()->profile->profile_pic ? asset('uploads/' . auth()->user()->profile->profile_pic) : asset('admin_assets/images/user-grid/user-grid-img14.png') }}"
                            alt="User Profile Picture"
                            class="border br-white border-width-2-px w-200-px  rounded-full object-fit-cover mx-auto" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover; ">

                        <h6 class="mb-0 mt-4">{{ $user->name }}</h6>
                        <span class="text-secondary-light mb-4">{{ $user->email }}</span>
                    </div>
                    <div class="mt-6">
                        <h6 class="text-xl mb-4">Personal Info</h6>
                        <ul>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200">Full
                                    Name</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->name }}</span>
                            </li>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Email</span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->email }}</span>
                            </li>
                            <li class="flex items-center gap-1 mb-3">
                                <span class="w-[30%] text-base font-semibold text-neutral-600 dark:text-neutral-200"> Phone </span>
                                <span class="w-[70%] text-secondary-light font-medium">: {{ $user->phone }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-8">
            <div class="card h-full border-0">
                <div class="card-body p-6">

                    <ul class="tab-style-gradient flex flex-wrap text-sm font-medium text-center mb-5" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="" role="presentation">
                            <button
                                class="py-2.5 px-4 border-t-2 font-semibold text-base inline-flex items-center gap-3 text-neutral-600"
                                id="edit-profile-tab" data-tabs-target="#edit-profile" type="button" role="tab"
                                aria-controls="edit-profile" aria-selected="false">
                                Edit Profile
                            </button>
                        </li>
                        <li class="" role="presentation">
                            <button
                                class="py-2.5 px-4 border-t-2 font-semibold text-base inline-flex items-center gap-3 text-neutral-600 hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="change-password-tab" data-tabs-target="#change-password" type="button" role="tab"
                                aria-controls="change-password" aria-selected="false">
                                Change Password
                            </button>
                        </li>
                    </ul>

                    <div id="default-tab-content">
                        <div class="hidden" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">


                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                <h6 class="text-base text-neutral-600 dark:text-neutral-200 mb-4">Profile Image</h6>
                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6">
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <input type="file" name="profile_pic" class="form-control rounded-lg" id="profile_pic">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6">
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="name"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Full
                                                Name <span class="text-danger-600">*</span></label>
                                            <input type="text" name="name" class="form-control rounded-lg" id="name" placeholder="Enter Full Name" value="{{ old('name', $user->name ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="email"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Email
                                                <span class="text-danger-600">*</span></label>
                                            <input type="email" readonly class="form-control rounded-lg" id="email" name="email"
                                                placeholder="Enter email address" value="{{ old('name', $user->email ?? '') }}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="number"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">Phone</label>
                                            <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}"
                                                class="form-control rounded-lg" id="phone" placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="address"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                                Address
                                            </label>
                                            <input type="text" name="address" value="{{ old('address', $user->profile->address ?? '') }}"
                                                class="form-control rounded-lg" id="address" placeholder="Enter your address">
                                        </div>
                                    </div>
                                </div>

                                <!-- Crypto Wallets -->
                                <h6 class="text-base text-neutral-600 dark:text-neutral-200 mt-4 mb-4">Crypto Wallets</h6>

                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6">
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="bitcoin"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                                Bitcoin Address
                                            </label>
                                            <input type="text" name="bitcoin_address"
                                                value="{{ old('bitcoin_address', $user->profile->bitcoin_address ?? '') }}"
                                                class="form-control rounded-lg" id="bitcoin" placeholder="Enter Bitcoin wallet address">
                                        </div>
                                    </div>

                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="etherium"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                                Ethereum Address
                                            </label>
                                            <input type="text" name="etherium_address"
                                                value="{{ old('etherium_address', $user->profile->etherium_address ?? '') }}"
                                                class="form-control rounded-lg" id="etherium" placeholder="Enter Ethereum wallet address">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6">
                                    <div class="col-span-12 sm:col-span-6">
                                        <div class="mb-5">
                                            <label for="usdt"
                                                class="inline-block font-semibold text-neutral-600 dark:text-neutral-200 text-sm mb-2">
                                                USDT Address
                                            </label>
                                            <input type="text" name="usdt_address"
                                                value="{{ old('usdt_address', $user->profile->usdt_address ?? '') }}"
                                                class="form-control rounded-lg" id="usdt" placeholder="Enter USDT wallet address">
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-center gap-3">
                                    <button type="button"
                                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-base px-14 py-[11px] rounded-lg">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="btn btn-primary border border-primary-600 text-base px-14 py-3 rounded-lg">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                        <form action="{{ route('password.update') }}" method="POST">
                            @csrf
                            <div id="change-password">
                                <div class="mb-5">
                                    <label for="old-password" class="font-semibold text-sm mb-2">Old Password <span class="text-danger-600">*</span></label>
                                    <div class="relative">
                                        <input type="password" name="old_password" class="form-control rounded-lg" id="old-password" placeholder="Enter Old Password*" required>
                                        <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#old-password"></span>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="new-password" class="font-semibold text-sm mb-2">New Password <span class="text-danger-600">*</span></label>
                                    <div class="relative">
                                        <input type="password" name="new_password" class="form-control rounded-lg" id="new-password" placeholder="Enter New Password*" required>
                                        <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#new-password"></span>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="confirm-password" class="font-semibold text-sm mb-2">Confirm Password <span class="text-danger-600">*</span></label>
                                    <div class="relative">
                                        <input type="password" name="new_password_confirmation" class="form-control rounded-lg" id="confirm-password" placeholder="Confirm New Password*" required>
                                        <span class="toggle-password ri-eye-line cursor-pointer absolute end-0 top-1/2 -translate-y-1/2 me-4 text-secondary-light" data-toggle="#confirm-password"></span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-center gap-3">
                                    <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 px-14 py-[11px] rounded-lg">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-primary border border-primary-600 px-14 py-3 rounded-lg">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection