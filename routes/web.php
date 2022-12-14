<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::redirect('/dashboard','/todo')->name('dashboard');

// Route::get('/dashboard', function () {
//     return to_route('todo.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/todo/{category}/category', [TodoController::class,'editCategory'])->name('todo.category');
    Route::get('/todo/{todo}/change', [TodoController::class,'change'])->name('todo.change');
    // Route::get('/todo/{category}/change', [TodoController::class,'changeCategory'])->name('category.change');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('todo', TodoController::class);
    Route::resource('category', CategoryController::class);
});

require __DIR__.'/auth.php';
