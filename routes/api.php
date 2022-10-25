<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\categoriaController;
use App\Http\Controllers\Api\PassportAuthController;

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

// Rota Segurança
Route::post("register", [PassportAuthController::class, 'register']);
Route::post("login", [PassportAuthController::class, 'login']);
Route::post("
", [PassportAuthController::class, 'logout'])->middleware('auth:api');
Route::get("user", [PassportAuthController::class, 'userInfo'])->middleware('auth:api');

// Rotas Categoria
Route::apiResource('categorias', CategoriaController::class)->middleware('auth:api');


// Route::middleware("localization")->group(function(){
//     Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//         return $request->user();
//     });
// });


