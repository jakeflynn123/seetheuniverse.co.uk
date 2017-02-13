<?php

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

/*Home route*/
Route::get('/', function()
{
    return view('home');
});
/*Accessible Pages*/
Route::get('about', function()
{
    return view('about');
});
Route::get('contact', function()
{
    return view('contact');
});
Route::get('submit', function()
{
    return view('submit');
});
Route::resource('segments', 'SegmentController');

Auth::routes();
Route::get('/adminpage', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {


        /*Admin Pages*/
        Route::resource('admin/articles', 'ArticleController');
        Route::resource('admin/comments', 'CommentController');
        Route::resource('admin/categories', 'CategoryController');
        Route::resource('admin/users', 'UserController');
        Route::resource('admin/roles', 'RoleController');
        Route::resource('admin/permissions', 'PermissionController');
    });
