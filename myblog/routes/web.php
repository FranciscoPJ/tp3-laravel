<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
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

require __DIR__ . '/auth.php';



//HOME
Route::get('/', [HomeController::class, 'index'])->name('home.index'); //se pasa el nombre de la clase y el metodo principal

//Category
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

// Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
// Route::put('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');

//POST
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('/post/create/{category}', [PostController::class, 'create'])->name('posts.create');
Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/post/edit/{id}', [PostController::class, 'update'])->name('posts.update');
Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');



//Nosotros
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
