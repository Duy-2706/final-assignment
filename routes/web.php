<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\LaptopController;
use App\Http\Middleware\CheckLaptop;
use App\Models\Customer;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'role',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['manager'])->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
    Route::middleware(['accountant'])->group(function () {
    });
    Route::middleware(['seller'])->group(function () {
        Route::resource('customers', CustomerController::class);
        Route::resource('orders', OrderController::class);
    });
    Route::middleware(['warehouse'])->group(function () {

    });
    Route::middleware(['customer-service'])->group(function () {

    });
    // Route::middleware('checklaptop')->group(function(){
    //     Route::get('/savelaptop',[LaptopController::class, 'Create'])->name('SaveLaptop');
    // });
});
