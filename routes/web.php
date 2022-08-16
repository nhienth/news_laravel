<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NewController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Models\Category;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// CLIENT ROUTE

Route::prefix('/')->group(function () {

    Route::get('', [ClientController::class, 'index']);
    Route::get('/search', [ClientController::class, 'search']);


    Route::prefix('/cate')->group(function () {
        Route::get('/{id}', [ClientController::class, 'getAllByCateId']);
    });

    Route::prefix('/post')->group(function () {
        Route::get('/details/{id}', [ClientController::class, 'details']);
    });

});


// ADMIN ROUTE


Route::prefix('/admin')->middleware('auth', 'CheckAdmin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::prefix('/cate')->group(function () {
        Route::get('/list', [CategoryController::class, 'index']);

        Route::post('/add', [CategoryController::class, 'store']);
        Route::get('/add', [CategoryController::class, 'create']);

        Route::get('/delete/{id}', [CategoryController::class, 'destroy']);

        Route::get('/update/{id}', [CategoryController::class, 'edit']);
        Route::post('/update/{id}', [CategoryController::class, 'update']);
    });

    Route::prefix('/post')->group(function () {
        Route::get('/add', [PostController::class, 'create']);
        Route::post('/add', [PostController::class, 'store']);

        Route::get('/list', [PostController::class, 'index']);
        Route::get('/delete/{id}', [PostController::class, 'destroy']);

        Route::get('/update/{id}', [PostController::class, 'edit']);
        Route::post('/update/{id}', [PostController::class, 'update']);
    });

    Route::prefix('/user')->group(function () {
        Route::get('/list', [UserController::class, 'index']);
        Route::post('/update/{id}', [UserController::class, 'update']);
    });
});



require __DIR__.'/auth.php';
