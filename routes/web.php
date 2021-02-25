<?php

use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;
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

// Route::get('/','StaticPagesController@home');

//这是首页的路由
Route::get('/',[StaticPagesController::class,'home'])->name('home');
//这是帮助页路由
Route::get('/help',[StaticPagesController::class,'help'])->name('help');
//这是关于页路由
Route::get('/about',[StaticPagesController::class,'about'])->name('about');
//用户注册路由
Route::get('signup',[UsersController::class,'create'])->name('signup');