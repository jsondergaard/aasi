<?php

Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile/settings', [SettingsController::class, 'index'])->name('users.settings');
Route::get('/profile/subscription', [SubscriptionController::class, 'index'])->name('users.subscription');
