<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



Route::group(['middleware' => 'auth:sanctum'], function () {
    
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    Route::resources([
        'post' => PostController::class,
        'user' => UserController::class,
        'comment' => CommentController::class,
        'like' => LikeController::class,
        'friends' => FriendRequestController::class,
        'notification' => NotificationController::class,
    ]);
});





// Route::middleware('auth:sanctum')->group(function () {    
// });






