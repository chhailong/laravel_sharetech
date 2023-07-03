<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\ElectronicController;
use App\Http\Controllers\API\AccessoryController;
use App\Http\Controllers\API\FilterController;
use App\Http\Controllers\API\LaptopController;
use App\Http\Controllers\API\RelatedController;
use App\Models\Electronic ;

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
Route::prefix('admin')->middleware('auth:sanctum' , 'isAdmin')->group(function() {

        // optimized routes
        // Route::resource('electronics', ElectronicController::class);
       
        // detailed routes
        // Route  for Electronics 
        Route::get('electronics',[ElectronicController::class,'index']);
        Route::post('electronics',[ElectronicController::class,'store']);
        Route::get('electronics/{id}',[ElectronicController::class,'show']);
        Route::put('electronics/{id}',[ElectronicController::class,'update']);
        Route::delete('electronics/{id}',[ElectronicController::class,'destroy']);
        // Route  for laptops
        Route::resource('laptops', LaptopController::class);
});

// public routes
Route::get('electronics',[ElectronicController::class,'index']);
Route::get('electronics/{id}',[ElectronicController::class,'show']);
Route::get('laptops' , [LaptopController::class , 'index']) ; 
Route::get('laptops' , [LaptopController::class , 'show']) ; 


// Auth routes
Route::post('register', 'App\Http\Controllers\API\Auth\AuthController@register');
Route::post('login', 'App\Http\Controllers\API\Auth\AuthController@login');

// search electronic  routes
Route::get('/electronics/search/{name}' ,[ElectronicController::class ,'search']) ; 

Route::get('/electronics/filter' , [FilterController::class , 'index']);
Route::get('/electronics/{id}/related',[RelatedController::class,'index']);



