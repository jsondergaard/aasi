<?php

Auth::routes();

Route::view('/', 'welcome');

Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'index'])->name('sponsors');
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::patch('/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/by-laws', 'by-laws')->name('by-laws');

Route::get('/pages/{page}', [App\Http\Controllers\PageController::class, 'view'])->name('page');
