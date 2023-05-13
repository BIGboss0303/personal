<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\WorkerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::group(['prefix'=>'v1','namespace'=>'App\Http\Controllers\Api\V1'],function(){
//     Route::get('workers',[WorkerController::class,'index']);
// });

Route::GET('workers',[WorkerController::class,'index']);
// Route::GET('workers/create',[WorkerController::class,'create']);
Route::POST('workers',[WorkerController::class,'store']);
Route::PATCH('workers/{id}',[WorkerController::class,'update']);

Route::POST('workers/{id}/image',[ImageController::class,'store']);
Route::POST('workers/{id}/file',[FileController::class,'store']);




Route::GET('workers/{id}',[WorkerController::class,'show']);
