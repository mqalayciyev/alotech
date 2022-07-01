<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::namespace('API')->group(function () {
    // Route::middleware(['api.auth'])->group(function () {
    //     Route::apiResources([
    //         'products' => ProductController::class,
    //         'categories' => CategoryController::class,
    //         'brands' => BrandController::class,
    //         'orders' => OrderController::class,
    //     ]);
    // });
    Route::post('/orders', 'OrderController@index');
});
