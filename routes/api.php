<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;



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



Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('adminReg',[AuthController::class,'adminReg']);
Route::post('admin',[App\Http\Controllers\adminController::class,'authenticate']);

Route::post('message',[App\Http\Controllers\chatController::class,'message']);

Route::get('/verify-email/{token}',[AuthController::class,'verifyUser']);

//limited Access for Authenticated user only
Route::middleware('auth:sanctum')->group(function () {
   Route::get('user',[AuthController::class,'user']);
   Route::get('profile',[AuthController::class,'viewprofile']);
   Route::get('match',[AuthController::class,'match']);
   Route::get('matchoccupation',[AuthController::class,'matchoccupation']);
   Route::get('matchedu',[AuthController::class,'matchedu']);
   Route::get('matchlocation',[AuthController::class,'matchlocation']);
   Route::get('userMoreInfo',[AuthController::class,'userMoreInfo']);
   Route::get('userpreference',[AuthController::class,'userpreference']);
   Route::post('addinfo',[AuthController::class,'addinfo']);
   Route::post('updateinfo',[AuthController::class,'updateinfo']);
   Route::post('preference',[AuthController::class,'preference']);
   Route::post('updatepreference',[AuthController::class,'updatepreference']);
   Route::get('justjoined',[AuthController::class,'justjoined']);
   Route::post('user.payment', [AuthController::class,'payment']);
});

  
   Route::middleware('auth:api')->get('/admin', function(Request $request) {
     Route::delete('/deleteUser/{id}',[App\Http\Controllers\adminController::class,'deleteUser']);
     Route::get('user',[AuthController::class,'user']);
});