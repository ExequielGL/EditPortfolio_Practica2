<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InterestController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\PersonalDataController;
use App\Http\Controllers\SocialNetworkController;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('profile',[ProfileController::class, 'show'])->name('api.profile.show');
Route::put('profile/edit/user',[UserController::class, 'update'])->name('api.user.update');
Route::put('profile/edit/personal-data',[PersonalDataController::class, 'update'])->name('api.personal.update');
Route::put('profile/edit/interests',[InterestController::class, 'update'])->name('api.interests.update');
Route::put('profile/edit/frameworks',[FrameworkController::class, 'update'])->name('api.frameworks.update');
Route::put('profile/edit/social-network',[SocialNetworkController::class, 'update'])->name('api.social.update');

