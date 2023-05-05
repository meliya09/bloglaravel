<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardContoller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('dashboard', [DashboardContoller::class, 'index']);

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardContoller::class,'index']);
    // Route Category
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/edit/{category}', [CategoryController::class, 'edit']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::get('/categories/delete/{category_id}', [CategoryController::class, 'destroy']);

    // Route Posts
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/edit/{post}', [PostController::class, 'edit']);
    Route::put('/posts/{post}', [PostController::class, 'update']);
    Route::get('/posts/delete/{post_id}', [PostController::class, 'destroy']);
});
