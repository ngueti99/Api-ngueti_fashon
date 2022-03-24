<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BrandController;
use App\Http\Controllers\API\categoyController;
use App\Http\Controllers\API\CityController;
use App\Http\Controllers\API\CollectController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\DistrictController;
use App\Models\Comment;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get('collects',[CollectController::class,'index']);
Route::post('collect',[CollectController::class,'store']);
Route::post('collect/{id}',[CollectController::class,'update']);
Route::delete('collect/{id}',[CollectController::class,'destroy']);

Route::get('categories',[categoyController::class,'index']);
Route::post('category',[categoyController::class,'store']);
Route::post('category/{id}',[categoyController::class,'update']);
Route::delete('category/{id}',[categoyController::class,'destroy']);


Route::get('cities',[CityController::class,'index']);
Route::post('city',[CityController::class,'store']);
Route::post('city/{id}',[CityController::class,'update']);
Route::delete('city/{id}',[CityController::class,'destroy']);

Route::get('districts',[DistrictController::class,'index']);
Route::post('district',[DistrictController::class,'store']);
Route::post('district/{id}',[DistrictController::class,'update']);
Route::delete('district/{id}',[DistrictController::class,'destroy']);

Route::get('comments',[CommentController::class,'index']);
Route::post('comment',[CommentController::class,'store']);
Route::post('comment/{id}',[CommentController::class,'update']);
Route::delete('comment/{id}',[CommentController::class,'destroy']);

Route::get('brands',[BrandController::class,'index']);
Route::post('brand',[BrandController::class,'store']);
Route::post('brand/{id}',[BrandController::class,'update']);
Route::delete('brand/{id}',[BrandController::class,'destroy']);


Route::middleware(['auth:sanctum','IsApiAdmin'])->group(function(){
    Route::get('checkingAuthentificated',function (){
        return response()->json(['Message'=>'you are in']);
    });
    Route::get('categories',[categoyController::class,'index']);

});



Route::middleware(['auth:sanctum'])->group(function(){
    Route::post('logout',[AuthController::class,'logout']);
});






Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
