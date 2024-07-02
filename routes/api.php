<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\VerificationController;


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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/v1/signin', [SigninController::class, 'APISigninUser']);


Route::group(['middleware' => ['App\Http\Middleware\APIMiddleware']], function () {
    Route::post('/v1/user/index/account/get', [AccountController::class, 'APIUserIndexAccountGet']);
});
