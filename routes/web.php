<?php

Auth::routes();

Route::get('/', function () {
	return view('page', [
		'page' => \App\Models\Page::where('id', 1)->firstOrFail()
	]);
});

Route::get('/sponsors', [App\Http\Controllers\SponsorController::class, 'index'])->name('sponsors');
Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
Route::patch('/settings', [App\Http\Controllers\SettingsController::class, 'update'])->name('settings.update');

Route::group(['prefix' => 'offers'], function () {
	Route::get('/', [App\Http\Controllers\OfferController::class, 'index'])->name('offers.index');
	Route::get('/{offer}', [App\Http\Controllers\OfferController::class, 'view'])->name('offers.view');
	Route::patch('/{offer}', [App\Http\Controllers\OfferController::class, 'activate'])->name('offers.activate');
});

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

Route::view('/about-us', 'about-us')->name('about-us');
Route::view('/by-laws', 'by-laws')->name('by-laws');

Route::get('/pages/{page}', [App\Http\Controllers\PageController::class, 'view'])->name('page');
