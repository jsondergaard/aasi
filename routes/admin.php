<?php

Route::get('/', 'HomeController@home')->name('admin.home');

Route::group(['prefix' => 'users'], function () {
	Route::get('/', 'UserController@index')->name('admin.users.index');
});
