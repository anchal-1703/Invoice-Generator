<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// basic route
Route::get('/', [AppController::class,'login']);
Route::get('/dashboard', [AppController::class,'dashboard']);

//route with parameter
// Route::get('/about/{paramn}', function () {
//     return "helo";
// });

// route with optional param
// Route::get('/about/{paramn?}', function () {
//     return "helo";
// });
// name route(reverse routing) name shold be unique
// Route::get('/test', "AppController@test()");

// Route::get('/test' , [AppController::class , 'test'])->name('tesnt');
// Route::get('/contact' , [AppController::class , 'about'])->name('tesnt');
