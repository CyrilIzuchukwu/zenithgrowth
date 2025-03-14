<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $plans = Plan::orderBy('created_at', 'DESC')->get();
    return view('welcome', compact('plans'));
});

Route::get('about', function () {
    return view('abouts.about');
});

Auth::routes();


Route::get('/auth/signup', [UserController::class, 'signup'])->name('signup');

Route::post('/auth/create', [UserController::class, 'create_user'])->name('user.create');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/signout', [HomeController::class, 'signout'])->name('signout');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');

    Route::get('/create-plan', [PlanController::class, 'addPlan'])->name('create_plan');

    Route::post('/store-plan', [PlanController::class, 'store'])->name('plans.store');

    Route::get('/plans', [PlanController::class, 'planList'])->name('plan.list');

    Route::get('/delete-plan/{id}', [PlanController::class, 'deletePlan'])->name('plan.delete');

    Route::get('/edit-plan/{id}', [PlanController::class, 'editPlan'])->name('plan.edit');

    Route::post('/update-plan/{id}', [PlanController::class, 'updatePlan'])->name('plan.update');

    Route::get('/create-wallet', [WalletController::class, 'addWallet'])->name('create_wallet');

    Route::post('/store-wallet', [WalletController::class, 'storeWallet'])->name('wallet.create');

    Route::get('/wallets', [WalletController::class, 'index'])->name('wallet.index');

    Route::delete('/wallets/{id}', [WalletController::class, 'destroy'])->name('wallet.delete');


    Route::get('/users', [AdminController::class, 'userIndex'])->name('user.index');
    Route::get('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('user.edit');
    Route::delete('/user/{id}', [AdminController::class, 'userDestroy'])->name('user.destroy');


    Route::controller(AdminController::class)->group(function () {
        Route::get('deposits/pending', 'pendingDeposits')->name('admin.deposits.pending');
        Route::get('deposits/approved', 'approvedDeposits')->name('admin.deposits.approved');
        Route::post('deposits/approve/{id}', 'approveDeposit')->name('admin.approve.deposit');
    });
});




Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('dashboard', 'user_dashboard')->name('user_dashboard');
        Route::get('profile', 'userProfile')->name('user.profile');
    });


    Route::controller(DepositController::class)->group(function () {
        Route::get('deposit', 'userDesposit')->name('user.deposit');
        Route::post('make-depost', 'userMakeDeposit')->name('user.make-deposit');
        Route::get('/confirm-deposit', 'confirmDeposit')->name('deposit.confirm');
        Route::post('/submit-deposit', 'submitDeposit')->name('deposit.submit');
        Route::get('/deposit-history', 'depositHistory')->name('user.deposit-history');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'userProfile')->name('user.profile');
    });


    Route::controller(InvestmentController::class)->group(function () {
        Route::get('/investments', 'myInvestments')->name('user.investments');
    });
});
