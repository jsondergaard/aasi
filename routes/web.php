<?php

Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'index'])->name('sponsors');
Route::get('/profile/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('users.settings');
Route::get('/profile/subscription', [App\Http\Controllers\SubscriptionController::class, 'index'])->name('users.subscription');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/by-laws', 'by-laws')->name('by-laws');

Route::group(['prefix' => 'activities'], function () {
	Route::view('/badminton', 'activities.badminton')->name('activities.badminton');
	Route::view('/soccer', 'activities.soccer')->name('activities.soccer');
	Route::view('/handball', 'activities.handball')->name('activities.handball');
	Route::view('/volley', 'activities.volley')->name('activities.volley');
	Route::view('/swimming', 'activities.swimming')->name('activities.swimming');
});
