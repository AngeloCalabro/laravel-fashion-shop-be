<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TextureController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\TagController;

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
    return view('guest.welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class)->parameters(['products' => 'product:slug']);
    Route::resource('brands', BrandController::class)->parameters(['brands' => 'brand:slug']);
    Route::resource('textures', TextureController::class)->parameters(['textures' => 'texture:slug']);
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    Route::resource('colors', ColorController::class)->parameters(['colors' => 'color:slug'])->except('show', 'create', 'edit');;
    Route::resource('tags', TagController::class)->parameters(['tags' => 'tag:slug'])->except('show', 'create', 'edit');

});

require __DIR__.'/auth.php';
