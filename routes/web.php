<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/createpost', [PostController::class, 'save'])->name('posts.save');
Route::post('/like', [PostController::class, 'like'])->name('posts.like');

Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => 'auth', 'verified'], function () {

    //DASHBOARD
    // Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


    // Route::get('/getcategoria/{id}', [CategoriasController::class, 'getCategoria'])->name('categorias.getCategoria');
    // Route::post('/categorias/order', [CategoriasController::class, 'order'])->name('categorias.order');
    // Route::post('/categorias/save', [CategoriasController::class, 'save'])->name('categorias.save');
    // Route::get('/categorias/show/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show');
    // Route::delete('/categorias/delete/{id}', [CategoriasController::class, 'delete'])->name('categorias.delete');

});
require __DIR__ . '/auth.php';
