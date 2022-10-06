<?php

Route::get('/', 'HomeController@home')->name('admin.home');

Route::group(['prefix' => 'users'], function () {
	Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});
