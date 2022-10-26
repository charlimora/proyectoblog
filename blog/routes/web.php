<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*borramos lo que estaba originalmente en la ruta '/' y llamamos al controlador del Post.
Además, para hacerle seguimiento a esa ruta, le asignamos un nombre con el método name().
No confundir este post.index con la ruta del view*/
Route::get('/', [PostController::class,'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
