<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'home']);
Route::post('/home/enter', [MainController::class, 'reg']);
Route::get('/chat', [MainController::class, 'chat']);
Route::post('/up_message', [MainController::class, 'app_message']);
Route::get('/load_message', [MainController::class, 'load_message']);
