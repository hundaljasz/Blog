<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/',[UserController::class,'Home']);
Route::get('login',[UserController::class,'login_view']);
Route::get('register',[UserController::class,'register_view']);
Route::get('add_new_blog',[UserController::class,'add_new_blog_view']);
Route::get('profile',[UserController::class,'profile_view']);
Route::get('/read/{id}',[UserController::class,'single_blog_view']);

Route::post('register_user',[BlogController::class,'register']);
Route::post('login_user',[BlogController::class,'login']);
Route::get('logout',[BlogController::class,'logout']);
Route::post('add_blog',[BlogController::class,'AddNewBlog']);
Route::post('comment',[BlogController::class,'add_new_comment']);
Route::post('search',[BlogController::class,'search_blog']);

Route::get('like',[BlogController::class,'add_new_like']);
Route::get('remove_like',[BlogController::class,'remove_like']);
Route::get('/category/{name}',[BlogController::class,'category_blogs']);