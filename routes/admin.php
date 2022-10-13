<?php

Route::get('/', 'HomeController@home')->name('admin.home');

Route::group(['prefix' => 'sponsors'], function () {
	Route::get('/', [App\Http\Controllers\Admin\SponsorController::class, 'index'])->name('admin.sponsors.index');
	Route::get('/create', [App\Http\Controllers\Admin\SponsorController::class, 'create'])->name('admin.sponsors.create');
	Route::get('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'view'])->name('admin.sponsors.view');
	Route::get('/{sponsor}/edit', [App\Http\Controllers\Admin\SponsorController::class, 'edit'])->name('admin.sponsors.edit');
	Route::delete('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'destroy'])->name('admin.sponsors.destroy');
});

Route::group(['prefix' => 'users'], function () {
	Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});
