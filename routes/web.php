<?php

Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
