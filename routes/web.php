<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;

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
    return view('templates.default');
});

//Route::get('/author', [AuthorController::class, 'index'])->name('author.index'); 
//Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create'); 
//Route::post('/author', [AuthorController::class, 'store'])->name('author.store'); 
//Route::get('/author/{id}/edit', [AuthorController::class, 'edit'])->name('author.edit'); 
//Route::put('/author/{id}', [AuthorController::class, 'update'])->name('author.update'); 
//Route::delete('/author/{id}', [AuthorController::class, 'destroy'])->name('author.destroy'); 

Route::resource('author', AuthorController::class)->middleware('auth');
Route::get('/authors/search', [AuthorController::class, 'search'])->name('author.search');
Route::resource('publisher', PublisherController::class)->middleware('auth');
Route::resource('books', BooksController::class)->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
