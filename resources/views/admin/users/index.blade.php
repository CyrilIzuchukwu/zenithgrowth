@extends('layout.admin')
@section('content')


<div class="dashboard-main-body">
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Users List</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="index.html" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Users List</li>
        </ul>
    </div>

    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="card h-full p-0 rounded-xl border-0 overflow-hidden">
                <div
                    class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                    <div class="flex items-center flex-wrap gap-3">
                        <form class="navbar-search">
                            <input type="text" class="bg-white dark:bg-neutral-700 h-10 w-auto" name="search"
                                placeholder="Search">
                            <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                        </form>
                        <select
                            class="form-select form-select-sm w-auto dark:bg-neutral-600 dark:text-white border-neutral-200 dark:border-neutral-500 rounded-lg">
                            <option>Status</option>
                            <option>Active</option>
                            <option>Inactive</option>
                        </select>
                    </div>
                    <a href="add-user.html"
                        class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                        <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                        Add New User
                    </a>
                </div>
                <div class="card-body p-6">
                    <div class="table-responsive scroll-sm">
                        <table class="table bordered-table sm-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Join Date</th>
                                    <th scope="col">USDT Address</th>
                                    <th scope="col">Ethereum Address</th>
                                    <th scope="col">Bitcoin Address</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>
                                        <div class="flex items-center">
                                            @if ($user->profile && $user->profile->profile_pic)
                                            <img src="{{ asset('uploads/' . $user->profile->profile_pic) }}" alt=""
                                                class="w-10 h-10 rounded-full shrink-0 me-2 overflow-hidden">
                                            @else
                                            N/A
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td>{{ $user->profile->usdt_address ?? 'N/A' }}</td>
                                    <td>{{ $user->profile->etherium_address ?? 'N/A' }}</td>
                                    <td>{{ $user->profile->bitcoin_address ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        @if ($user->active == 1)
                                        <span
                                            class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 border border-success-600 px-6 py-1.5 rounded font-medium text-sm">Active</span>
                                        @else
                                        <span
                                            class="bg-success-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 border border-danger-600 px-6 py-1.5 rounded font-medium text-sm">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center gap-3 justify-center">
                                            <button type="button"
                                                class="bg-info-100 dark:bg-info-600/25 hover:bg-info-200 text-info-600 dark:text-info-400 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                <iconify-icon icon="majesticons:eye-line" class="icon text-xl"></iconify-icon>
                                            </button>
                                            <a href="{{ route('user.edit', $user->id) }}">
                                                <button type="button"
                                                    class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 bg-hover-success-200 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                    <iconify-icon icon="lucide:edit" class="menu-icon"></iconify-icon>
                                                </button>
                                            </a>

                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="remove-item-btn bg-danger-100 dark:bg-danger-600/25 hover:bg-danger-200 text-danger-600 dark:text-danger-500 font-medium w-10 h-10 flex justify-center items-center rounded-full">
                                                    <iconify-icon icon="fluent:delete-24-regular" class="menu-icon"></iconify-icon>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection