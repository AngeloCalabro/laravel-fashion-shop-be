<?php

use App\Http\Controllers\Api\LeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{slug}', [ProductController::class, 'show']);
Route::get('brands', [BrandController::class, 'index']);
Route::get('textures', [TextureController::class, 'index']);
Route::get('types', [TypeController::class, 'index']);
Route::get('colors', [ColorController::class, 'index']);
Route::get('tags', [TagController::class, 'index']);

Route::post('/contacts',[LeadController::class,'store']);

