<?php

Auth::routes();

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'index'])->name('sponsors');
Route::get('/profile/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::patch('/profile/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/by-laws', 'by-laws')->name('by-laws');

Route::get('/pages/{page}', [App\Http\Controllers\PageController::class, 'view'])->name('page');
