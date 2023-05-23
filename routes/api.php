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


Route::GET('workers',[WorkerController::class,'index']);
Route::GET('workers/create',[WorkerController::class,'create']);
Route::POST('workers',[WorkerController::class,'store']);
Route::GET('workers/{id}/edit',[WorkerController::class,'edit']);
Route::DELETE('workers/{id}/delete',[WorkerController::class,'destroy']);
Route::PUT('workers',[WorkerController::class,'update']);

//Чтобы добавлять и удалять изображения
// id - id работника, image_id -  id изображения
// input должен иметь имя image
Route::POST('workers/{id}/image',[ImageController::class,'store']);
Route::DELETE('workers/{id}/image/{image_id}',[ImageController::class,'destroy']);


//Чтобы добавлять и удалять файлы
// id - id работника,   file_id -  id файла
// input должен иметь имя file

Route::POST('workers/{id}/file',[FileController::class,'store']);
Route::DELETE('workers/{id}/file/{file_id}',[FileController::class,'destroy']);

Route::GET('workers/{id}',[WorkerController::class,'show']);
