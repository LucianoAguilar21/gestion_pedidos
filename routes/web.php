<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// PRODUCTS
Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('products');
Route::get('/products/create',[ProductController::class,'create'])->middleware(['auth', 'verified'])->name('products.create');
Route::get('/products/{product}/show',[ProductController::class,'show'])->middleware(['auth', 'verified'])->name('products.show');
Route::get('/products/{product}/edit',[ProductController::class,'edit'])->middleware(['auth', 'verified'])->name('products.edit');
Route::put('/products/{product}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{product}/destroy',[ProductController::class,'destroy'])->middleware(['auth', 'verified'])->name('products.destroy');
Route::post('/products/store',[ProductController::class,'store'])->middleware(['auth', 'verified'])->name('products.store');

// CUSTOMERS
Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/customers/create',[CustomerController::class,'create'])->name('customers.create');
Route::get('/customers/{customer}/show',[CustomerController::class,'show'])->name('customers.show');
Route::get('/customers/{customer}/edit',[CustomerController::class,'edit'])->name('customers.edit');
Route::put('/customers/{customer}',[CustomerController::class,'update'])->name('customers.update');
Route::delete('/customers/{customer}/destroy',[CustomerController::class,'destroy'])->name('customers.destroy');
Route::post('/customers/store',[CustomerController::class,'store'])->name('customers.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
