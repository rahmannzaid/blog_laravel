<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*
Route::get('tes', function()
{
	return View::make('admin/tes');
});

Route::group(array('prefix' => 'admin'), function() {
    //Route::controller('/', 'admin\DashboardController');
	Route::get('/dashboard/tes', 'admin\DashboardController@tes');
});

Route::get('ses', 'HomeController@tes');
*/

Route::get('/','HomeController@getIndex');
Route::controller('home','HomeController');
Route::get('read/{y}/{m}/{d}/{c}/{id}/{title}','ReadController@getIndex');
Route::get('read/{y}/{m}/{d}/{c}/{id}','ReadController@getIndex');
Route::get('read/{y}/{m}/{d}/{c}','ReadController@getCat');
Route::get('read/{y}/{m}/{d}','ReadController@getDate');
Route::get('read/{y}/{m}','ReadController@getMonth');
Route::get('read/{y}','ReadController@getYear');
Route::get('read',function(){
    return Redirect::to('/');
    });
Route::post('read/send_message','ReadController@postSend_message');


Route::controller('category/{any}', 'CatController');
Route::controller('tags/{any}', 'TagsController');


Route::get('zadmin','DashboardController@getIndex');

Route::controller('zadmin/login','LoginController');
Route::controller('zadmin/dashboard','DashboardController');
Route::controller('zadmin/category','CategoryController');
Route::controller('zadmin/tag','TagController');
Route::controller('zadmin/article','ArticleController');
Route::controller('zadmin/contact','ContactController');
Route::controller('zadmin/profile','ProfileController');
Route::controller('zadmin/setting','SettingController');
Route::controller('zadmin/comment','CommentController');