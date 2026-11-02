<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
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


    Route::get('/posts', IndexController::class)->name("post.index");
    Route::get("/posts/create", CreateController::class)->name("post.create");

    Route::post("/posts", StoreController::class)->name("post.store");
    Route::get("/posts/{post}", ShowController::class)->name("post.show");
    Route::get("/posts/{post}/edit", EditController::class)->name("post.edit");
    Route::patch("/posts/{post}", UpdateController::class)->name("post.update");
    Route::delete("/posts/{post}", DestroyController::class)->name("post.destroy");


Route::get('/main', [MainController::class, 'index'])->name("main.index");
Route::get('/contacts', [ContactController::class, 'index'])->name("contact.index");
Route::get('/about', action: [AboutController::class, 'index'])->name("about.index");
