<?php
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('User-contol',[UserController::class, 'index']);
Route::get('get-User',[UserController::class, 'getusers']);
Route::get('get-Userdetails/{id}',[UserController::class, 'getusersdetails']);
Route::put('Update-user/{id}',[UserController::class, 'updateuser']);
Route::delete('delete-user/{id}',[UserController::class, 'deleteuser']);
Route::post('login',[UserController::class, 'login']);
