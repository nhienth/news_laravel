<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinController;
use App\Http\Controllers\LoaiTinController;
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

Route::get('/', function () {
    $cate = new Category();
    $listCate = $cate->GetAll();
    return view('index', ['listCate'=>$listCate]);
});

Route::get('/tin/{id}', [TinController::class, 'ChiTiet']);
Route::get('/cat/{id}', [TinController::class, 'TinTrongLoai']);
Route::get('/timKiem', [TinController::class, 'timKiem']);

require __DIR__.'/auth.php';
