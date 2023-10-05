<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
    return view('welcome');
});

Route::prefix('todos')->group(function() {
    Route::get('/create', [TodoController::class, 'create'])->name('todos.create'); 
    Route::post('/create', [TodoController::class, 'store'])->name('todos.store'); 
    Route::get('/edit/{todo}', [TodoController::class, 'edit'])->name('todos.edit');
    Route::post('/edit/{todo}', [TodoController::class, 'update'])->name('todos.update');
    Route::get('/done/{todo}', [TodoController::class, 'done'])->name('todos.done');

});

Route::get('/dashboard', [TodoController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
