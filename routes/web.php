<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// User Authentication Routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard');


// Transaction Routes
// Route::middleware('auth')->prefix('transactions')->controller(TransactionController::class)->group(function () {
//     // list all transactions
//     Route::get('/', 'index')->name('transactions.index');

//     // add new transaction
//     Route::get('/create', 'create')->name('transactions.create');
//     Route::post('/', 'store')->name('transactions.store');

//     // update the transactions detail
//     Route::get('/{id}/edit', 'edit')->name('transactions.edit');
//     Route::put('/{id}', 'update')->name('transactions.update');

//     // delete the transaction
//     Route::delete('/{id}', 'destroy')->name('transactions.destroy');
// });


// Category Routes
// Route::middleware('auth')->prefix('categories')->controller(CategoryController::class)->group(function () {
//     // list all category
//     Route::get('/', 'index')->name('categories.index');

//     // add new category
//     Route::get('/create', 'create')->name('categories.create');
//     Route::post('/', 'store')->name('categories.store');

//     // edit category
//     Route::get('/{id}/edit', 'edit')->name('categories.edit');
//     Route::put('/{id}', 'update')->name('categories.update');

//     // delete category
//     Route::delete('/{id}', 'destroy')->name('categories.destroy');
//     Route::get('/categories/{id}/transactions', 'transactions')->name('categories.transactions');
// });
Route::resource('categories', CategoryController::class);

Route::resource('transactions', TransactionController::class);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
