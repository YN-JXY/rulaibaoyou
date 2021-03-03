<?php

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UsersController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;

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

Route::get('/home',[StaticPagesController::class,'home'])->name('home');
//这是首页的路由
Route::get('/',[StaticPagesController::class,'home'])->name('home');
//这是帮助页路由
Route::get('/help',[StaticPagesController::class,'help'])->name('help');
//这是关于页路由
Route::get('/about',[StaticPagesController::class,'about'])->name('about');
//用户注册路由
Route::get('signup',[UsersController::class,'create'])->name('signup');

//resource该方法接收俩个参数，第一个参数为资源名称，第二个参数为控制器名称
Route::resource('users','UsersController');
//显示登陆页面
Route::get('login',[SessionsController::class,'create'])->name('login');
//创建新会话
Route::post('login',[SessionsController::class,'store'])->name('login');
//销毁会话
Route::delete('logout',[SessionsController::class,'destroy'])->name('logout');

Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::resource('statuses','StatusesController',['only' => ['store','destroy']]);

Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');