<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lol', [PostController::class, "index"]);

Route::get("/post/create", [PostController::class, "create"]);
Route::get("/post/update", [PostController::class, "update"]);
Route::get('/post/first-or-create', [PostController::class, 'firstOrCreate']);
Route::get('/post/update-or-create', [PostController::class, 'updateOrCreate']);
