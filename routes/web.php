<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





//ادارة المنتجات

use App\Http\Controllers\Products\ItemController;
Route::middleware(['auth'])->group(function () {
    Route::resource('items', ItemController::class);
Route::get('/it', [ItemController::class, 'create'])->name('items.create');
Route::get('/it', [ItemController::class, 'store'])->name('items.store');
Route::get('/it', [ItemController::class, 'index'])->name('items.index');
Route::resource('it', ItemController::class)->only(['index','store']);
Route::get('/items/edit/{id}', [ItemController::class, 'edit'])->name('items.edit');
});
