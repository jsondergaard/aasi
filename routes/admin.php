<?php

Route::get('/', 'HomeController@home')->name('admin.home');

Route::group(['prefix' => 'sponsors'], function () {
	Route::get('/', [App\Http\Controllers\Admin\SponsorController::class, 'index'])->name('admin.sponsors.index');
	Route::get('/create', [App\Http\Controllers\Admin\SponsorController::class, 'create'])->name('admin.sponsors.create');
	Route::get('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'view'])->name('admin.sponsors.view');
	Route::get('/{sponsor}/edit', [App\Http\Controllers\Admin\SponsorController::class, 'edit'])->name('admin.sponsors.edit');
	Route::delete('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'destroy'])->name('admin.sponsors.destroy');
});

Route::group(['prefix' => 'pages'], function () {
	Route::get('/', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('admin.pages.index');
	Route::get('/create', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('admin.pages.create');
	Route::post('/create', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('admin.pages.store');
	Route::get('/{page}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('admin.pages.edit');
	Route::patch('/{page}', [App\Http\Controllers\Admin\PageController::class, 'update'])->name('admin.pages.update');
	Route::delete('/{page}', [App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('admin.pages.destroy');
});

Route::group(['prefix' => 'users'], function () {
	Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.users.index');
});
