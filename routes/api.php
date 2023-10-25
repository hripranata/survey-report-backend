<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\LoadingController;
use App\Http\Controllers\API\BunkerController;
use App\Http\Controllers\API\ExportController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VesselController;
use PHPUnit\Event\TestSuite\Loaded;

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
    Route::post('forgot_password', 'sendPasswordResetToken');
    Route::post('reset_password', 'validatePasswordResetToken');
    Route::post('validate_token', 'tokenValidation');
});
        
Route::middleware('auth:sanctum')->group( function () {
    Route::middleware('role:admin')->group( function () {
        Route::apiResource('vessels', VesselController::class);
    });
    Route::apiResource('users', UserController::class);
    Route::post('users/update_password', [UserController::class, 'updatePassword']);
    
    Route::apiResource('loadings', LoadingController::class);
    Route::get('loadings/filter/{month}/{year}', [LoadingController::class, 'filter']);
    Route::get('loadings/filterbydate/{start}/{end}', [LoadingController::class, 'filterByDate']);
    Route::get('loadings/filterbyuser/{user_id}/{start}/{end}', [LoadingController::class, 'filterByIdDate']);

    Route::apiResource('bunkers', BunkerController::class);
    Route::get('bunkers/filter/{month}/{year}', [BunkerController::class, 'filter']);
    Route::get('bunkers/filterbydate/{start}/{end}', [BunkerController::class, 'filterByDate']);
    Route::get('bunkers/filterbyuser/{user_id}/{start}/{end}', [BunkerController::class, 'filterByIdDate']);

    Route::get('lodetails/filter/{tongkang}', [BunkerController::class, 'listlodetail']);
    Route::get('vessels/filter/{type}', [VesselController::class, 'filter']);
    Route::get('loadings/count/{month}', [LoadingController::class, 'loading_counter']);
    Route::get('bunkers/count/{month}', [BunkerController::class, 'bunker_counter']);

    Route::get('exports/loadings/{start}/{end}', [ExportController::class, 'export_loading']);
    Route::get('exports/bunkers/{start}/{end}', [ExportController::class, 'export_bunker']);
});