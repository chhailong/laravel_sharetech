<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\ElectronicController;

use App\Http\Controllers\API\FilterController;
use App\Http\Controllers\API\FilterElectronicController;
use App\Http\Controllers\API\LaptopController;
use App\Http\Controllers\API\RelatedController;
use App\Http\Controllers\API\FavoriteController;
use App\Models\Electronic ;
use Termwind\Components\Element;

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
        Route::resource('electronics', ElectronicController::class);
       
        // detailed routes
        // Route  for Electronics 
        // Route::get('electronics',[ElectronicController::class,'index']);
        // Route::post('electronics',[ElectronicController::class,'store']);
        // Route::get('electronics/{id}',[ElectronicController::class,'show']);
        // Route::put('electronics/{id}',[ElectronicController::class,'update']);
        // Route::delete('electronics/{id}',[ElectronicController::class,'destroy']);

        
        //route admin recommended electronics

        // Route  for laptops

        Route::resource('laptops', LaptopController::class);
});

//user route 
Route::prefix('user')->middleware('auth:sanctum')->group(function(){

        // Route::delete('electronics/{id}/favorite', [FavoriteController::class, 'destroy']);

        Route::get('/favorites',  [FavoriteController::class, 'index']);
        Route::post('/favorites/{electronic}',  [FavoriteController::class, 'store']);
        Route::delete('/favorites/{id}',  [FavoriteController::class, 'destroy']);
}); 



// public routes
Route::get('electronics',[ElectronicController::class,'index']);
Route::get('electronics/{id}',[ElectronicController::class,'show']);

Route::get('laptops' , [LaptopController::class , 'index']) ; 
Route::get('laptops', [LaptopController::class , 'show']) ; 


// Auth routes
Route::post('register', 'App\Http\Controllers\API\Auth\AuthController@register');
Route::post('login', 'App\Http\Controllers\API\Auth\AuthController@login');
Route::post('logout', 'App\Http\Controllers\API\Auth\AuthController@logout')->middleware('auth:sanctum');
Route::post('forgot-password', 'App\Http\Controllers\API\Auth\AuthController@forgotPassword');

// search electronic  routes
Route::get('/electronics/search/{name}' ,[ElectronicController::class ,'search']) ; 
Route::get('electronics/{id}/related',[RelatedController::class,'index']);
Route::get('electronic/filtering' , [FilterElectronicController::class , 'recommend']);






