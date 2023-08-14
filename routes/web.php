<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\DetailTransactionController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CartController;

// Rute Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



// Rute yang hanya dapat diakses oleh admin
Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/books', 'AdminController@books')->name('admin.books');
    // Tambahkan rute lain yang hanya dapat diakses oleh admin di sini
});

// Rute yang hanya dapat diakses oleh user
Route::middleware(['auth', 'checkRole:user'])->group(function () {
    Route::get('/user/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/user/books', 'UserController@books')->name('user.books');
    // Tambahkan rute lain yang hanya dapat diakses oleh user di sini
});

// Rute CRUD untuk Buku
Route::prefix('books')->group(function () {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/', [BookController::class, 'store'])->name('books.store');
    Route::get('/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/{id}', [BookController::class, 'destroy'])->name('books.destroy');
});

// Rute CRUD untuk Jenis Buku
Route::prefix('booktypes')->group(function () {
    Route::get('/', [BookTypeController::class, 'index'])->name('booktypes.index');
    Route::get('/create', [BookTypeController::class, 'create'])->name('booktypes.create');
    Route::post('/', [BookTypeController::class, 'store'])->name('booktypes.store');
    Route::get('/{id}', [BookTypeController::class, 'show'])->name('booktypes.show');
    Route::get('/{id}/edit', [BookTypeController::class, 'edit'])->name('booktypes.edit');
    Route::put('/{id}', [BookTypeController::class, 'update'])->name('booktypes.update');
    Route::delete('/{id}', [BookTypeController::class, 'destroy'])->name('booktypes.destroy');
});


// Rute CRUD untuk Detail Transaksi
Route::prefix('detailtransactions')->group(function () {
    Route::get('/', [DetailTransactionController::class, 'index'])->name('detailtransactions.index');
    Route::get('/create/{transaction_id}', [DetailTransactionController::class, 'create'])->name('detailtransactions.create');
    Route::post('/', [DetailTransactionController::class, 'store'])->name('detailtransactions.store');
    Route::get('/{id}', [DetailTransactionController::class, 'show'])->name('detailtransactions.show');
    Route::get('/{id}/edit', [DetailTransactionController::class, 'edit'])->name('detailtransactions.edit');
    Route::put('/{id}', [DetailTransactionController::class, 'update'])->name('detailtransactions.update');
    Route::delete('/{id}', [DetailTransactionController::class, 'destroy'])->name('detailtransactions.destroy');
});


// Rute CRUD untuk Transaksi
Route::prefix('transactions')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/{id}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    // Rute untuk user
    Route::get('detailtransactions', [DetailTransactionController::class, 'index'])->name('detailtransactions.index');
    Route::get('detailtransactions/{id}', [DetailTransactionController::class, 'show'])->name('detailtransactions.show');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Rute untuk admin
    Route::resource('detailtransactions', DetailTransactionController::class);
});


Route::middleware(['auth', 'checkRole:user'])->group(function () {
    // ...
    Route::get('/user/cart/add/{book_id}', [CartController::class, 'addToCart'])->name('user.cart.add');
    Route::get('/user/cart', [CartController::class, 'showCart'])->name('user.cart');
    Route::delete('/user/cart/{cart_id}', [CartController::class, 'removeFromCart'])->name('user.cart.remove');
    Route::get('/user/cart/checkout', [CartController::class, 'checkout'])->name('user.cart.checkout');
});

    


