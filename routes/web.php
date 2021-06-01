<?php

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
Auth::routes();
Route::get('/', function () {
    return view('admin.login');
})->middleware('checkAuth');
Route::post('adminlogin', "AdminController@adminlogin")->middleware('checkAuth');


Route::get('logout-user', function (){
    \Illuminate\Support\Facades\Session::flush();
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout-user');



//dashboard routes
Route::get('dashboard', "DashboardController@dashboard")->middleware('dashboard');
Route::get('all-users', "DashboardController@allusers")->middleware('dashboard');
Route::get('edit-guides', "DashboardController@editGuides")->middleware('dashboard');
Route::get('edit-tips', "DashboardController@editTips")->middleware('dashboard');
Route::post('update-text', "DashboardController@updateText")->middleware('dashboard');
Route::post('post-add-tokens', "DashboardController@postAddTokens")->middleware('dashboard');
Route::get('block-user/{id}', "DashboardController@block")->middleware('dashboard');
Route::get('unblock-user/{id}', "DashboardController@unblock")->middleware('dashboard');
