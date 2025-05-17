<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomApiAuthController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
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


Route::get('/send-notification', [NotificationController::class, 'send']);



 

 



Route::group(['middleware'=>'api'],function($routes){


    //Mobile Api
    Route::post('/mobile-login',[CustomApiAuthController::class,'mobile_login']);
    // for this project below route use from super admin
    Route::post('/register-user',[CustomApiAuthController::class,'register']);
    Route::post('/register-mobile-otp',[CustomApiAuthController::class,'registerOtp']);
    Route::post('/register-mobile-otp-verify',[CustomApiAuthController::class,'registerverifyOtp']);

    // login with Mgs91 
    Route::post('/login-otp',[CustomApiAuthController::class,'loginOtp']);
    Route::post('/verify-login-otp',[CustomApiAuthController::class,'verifyOtpLoginOTP']);

    // web Api
    Route::post('/web-login',[CustomApiAuthController::class,'web_login']);
    Route::post('/web-verify-login-otp',[CustomApiAuthController::class,'webverifyOtpLoginOTP']);

  
   // for both Web and Api only Email
    Route::post('/reset_password',[CustomApiAuthController::class,'reset_password_link']);
    Route::post('/verify_otp',[CustomApiAuthController::class,'verify_otp_update_password']);


  
 

});


// Route::group(['middleware'=>['jwt.verify', 'checkPos']],function($routes){
 Route::group(['middleware'=>['jwt.verify', 'checkPos'],  'prefix' => 'pos'],function($routes){
    
    Route::get('get-profile',[ProfileController::class,'index']);


});

// Route::group(['middleware'=>['jwt.verify', 'checkManager']],function($routes){
    Route::group(['middleware'=>['jwt.verify', 'checkManager'],  'prefix' => 'manager'],function($routes){

    
    Route::get('get-profile',[ProfileController::class,'index']);


});
