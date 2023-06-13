<?php

use App\Http\Controllers\AccessoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\LaptopController ;
use App\Http\Controllers\ElectronicController ;
use App\Http\Controllers\FilterController;

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

// admin routes 
Route::prefix('admin')->middleware('auth:sanctum' , 'isAdmin')->group(function(){

        // optimized routes
        // Route::resource('laptops', LaptopController::class);

        // detailed routes
        // Route  for Electronics 
        Route::get('electronics',[ElectronicController::class,'index']);
        Route::post('electronics',[ElectronicController::class,'store']);
        Route::get('electronics/{id}',[ElectronicController::class,'show']);
        Route::put('electronics/{id}',[ElectronicController::class,'update']);
        Route::delete('electronics/{id}',[ElectronicController::class,'destroy']);


        //  Acessoeries Routes
        // Route::get('accessories' ,[AccessoryController::class , 'index']);
        Route::post('accessories' ,[AccessoryController::class , 'store']);
        // Route for Laptops
        // Route::get('laptops',[LaptopController::class,'index']);
        // Route::post('laptops',[LaptopController::class,'store']);
        // Route::get('laptops/{id}',[LaptopController::class,'show']);
        // Route::put('laptops/{id}',[LaptopController::class,'update']);
        // Route::delete('laptops/{id}',[LaptopController::class,'destroy']);
});


// public routes

Route::get('/electronics',[ElectronicController::class,'index']);
Route::get('/accessories' ,[AccessoryController::class , 'index']);
Route::get('/electronics/{id}',[ElectronicController::class,'show']);



Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/laptops',[LaptopController::class,'index']);
Route::get('/laptops/{id}',[LaptopController::class,'show']);
Route::get('/laptops/search/{name}' ,[LaptopController::class ,'search']) ; 
Route::get('/electronics/filter' , [FilterController::class  , 'index']);

