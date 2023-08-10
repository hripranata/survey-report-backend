<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LoadingController;
use App\Http\Controllers\API\BunkerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::apiResource('loadings', LoadingController::class);
    Route::get('loadings/filter/{month}', [LoadingController::class, 'filter']);
    Route::apiResource('bunkers', BunkerController::class)->middleware('role:admin');
    Route::get('lodetails/filter/{tongkang}', [BunkerController::class, 'listlodetail']);
});