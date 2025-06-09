<?php

use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

//HOME
Route::get('/', [HomeController::class, 'index'])->name('home.index'); //se pasa el nombre de la clase y el metodo principal

// CATEGORY
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/show/{id}', [CategoryController::class, 'show'])->name('category.show');

// POST
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('posts.show');

// AUTENTICACION
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //POST
    Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/post/edit/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');

    //COMENTARIOS
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->middleware('auth')
        ->name('comments.store');
});

require __DIR__ . '/auth.php';