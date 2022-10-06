<?php

Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/sponsors', [SponsorController::class, 'index'])->name('sponsors');
Route::get('/profile/settings', [SettingsController::class, 'index'])->name('users.settings');
Route::get('/profile/subscription', [SubscriptionController::class, 'index'])->name('users.subscription');

Route::group(['prefix' => 'activities'], function () {
	Route::view('/badminton', 'activities.badminton')->name('activities.badminton');
	Route::view('/soccer', 'activities.soccer')->name('activities.soccer');
	Route::view('/handball', 'activities.handball')->name('activities.handball');
	Route::view('/volley', 'activities.volley')->name('activities.volley');
	Route::view('/swimming', 'activities.swimming')->name('activities.swimming');
});
