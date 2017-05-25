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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=> ['auth']],function(){
    Route::resource('user', 'UserController');
    Route::resource('company', 'CompanyController');

    Route::get('origin', [ 'as' => 'origin.index', 'uses' => 'SettingController@index']);

    Route::get('origin/setting', [ 'as' => 'origin.setting', 'uses' => 'SettingController@manageSetting']);
    Route::post('origin/update', [ 'as' => 'origin.update', 'uses' => 'SettingController@updateSetting']);
});
