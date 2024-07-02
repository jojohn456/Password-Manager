<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'index']);
Route::get('/signup', [PublicController::class, 'index']);
Route::get('/signin', [PublicController::class, 'index']);
/*axios*/
Route::post('/signup/user/create', [SignupController::class, 'signupUserCreate']);
Route::post('/signin/user', [SigninController::class, 'signinUser']);
Route::get('/signout/user', [SigninController::class, 'signoutUser']);
Route::get('/verify/{verification_token}', [VerificationController::class, 'signupVerification']);
Route::get('/verified', [PublicController::class, 'index']);

/* footer */
Route::get('/help', [PublicController::class, 'index']);
Route::get('/about', [PublicController::class, 'index']);
Route::get('/eula', [PublicController::class, 'index']);
Route::get('/privacypolicy', [PublicController::class, 'index']);

Route::group(['middleware' => ['App\Http\Middleware\UnVerifiedMiddleware']], function () {
    Route::get('/verification', [PublicController::class, 'index']);
    /*axios*/
    Route::post('/auth/check/verification', [SigninController::class, 'authCheck']);
    Route::get('/verification/name', [SigninController::class, 'userName']);
    Route::post('/verification/signup/send', [VerificationController::class, 'sendSignupVerification']);
    Route::post('/verification/signup/resend', [VerificationController::class, 'reSendSignupVerification']);
});

Route::group(['middleware' => ['App\Http\Middleware\UserMiddleware']], function () {
    Route::get('/user/index', [PublicController::class, 'index']);
    /*axios*/
    Route::post('/auth/check/user', [SigninController::class, 'authCheck']);
    Route::get('/user/name', [SigninController::class, 'userName']);
    Route::get('/user/index/account/get', [AccountController::class, 'userIndexAccountGet']);
    Route::post('/user/index/account/data/get', [AccountController::class, 'userIndexAccountDataGet']);
    Route::post('/user/index/account/create', [AccountController::class, 'userIndexAccountCreate']);
    Route::post('/user/index/account/update', [AccountController::class, 'userIndexAccountUpdate']);
    Route::post('/user/index/account/delete', [AccountController::class, 'userIndexAccountDelete']);
});
