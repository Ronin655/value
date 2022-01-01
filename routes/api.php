<?php

use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\CreateLessonController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\ShowLessonController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('registration', 'AuthController@registration');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
//Route::get('/indicators/{id}', [ShowIndicatorController::class, 'show']);
//Route::post('/indicators', [GenerateIndicatorController::class, 'generate']);

//Route::apiResource('/indicators', IndicatorController::class);
//Route::apiResource('/tasks', TaskController::class);

Route::apiResource('categories', CategoryController::class)
    ->only('index', 'store', 'update', 'destroy');
Route::apiResource('brands', BrandController::class)
    ->only('index', 'store', 'update', 'destroy');

Route::apiResource('products', ProductController::class);

//Route::get('/tasks', [IndexTaskController::class, 'index']);
//Route::post('/tasks', [CreateTaskController::class, 'create']);
//Route::get('/tasks/{task}', [ShowTaskcontroller::class, 'showTasks']);


