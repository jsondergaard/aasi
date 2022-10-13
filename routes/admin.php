<?php

Route::get('/', 'HomeController@home')->name('admin.home');

Route::group(['prefix' => 'sponsors'], function () {
	Route::get('/', [App\Http\Controllers\Admin\SponsorController::class, 'index'])->name('admin.sponsors.index');
});

Route::group(['prefix' => 'pages'], function () {
	Route::get('/', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin.pages.index');
});

Route::group(['prefix' => 'users'], function () {
	Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});
