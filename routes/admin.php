<?php

Route::get('/', 'HomeController@home')->name('admin.home');

Route::group(['prefix' => 'sponsors'], function () {
	Route::get('/', [App\Http\Controllers\Admin\SponsorController::class, 'index'])->middleware(['permission:view sponsors'])->name('admin.sponsors.index');
	Route::get('/create', [App\Http\Controllers\Admin\SponsorController::class, 'create'])->middleware(['permission:create sponsor'])->name('admin.sponsors.create');
	Route::post('/create', [App\Http\Controllers\Admin\SponsorController::class, 'store'])->middleware(['permission:create sponsor'])->name('admin.sponsors.store');
	Route::get('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'edit'])->middleware(['permission:update sponsor'])->name('admin.sponsors.edit');
	Route::patch('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'update'])->middleware(['permission:update sponsor'])->name('admin.sponsors.update');
	Route::delete('/{sponsor}', [App\Http\Controllers\Admin\SponsorController::class, 'destroy'])->middleware(['permission:delete sponsor'])->name('admin.sponsors.destroy');

	Route::group(['prefix' => '{sponsor}/offers'], function () {
		Route::get('/create', [App\Http\Controllers\Admin\OfferController::class, 'create'])->middleware(['permission:create offer'])->name('admin.sponsors.offers.create');
		Route::post('/create', [App\Http\Controllers\Admin\OfferController::class, 'store'])->middleware(['permission:create offer'])->name('admin.sponsors.offers.store');
		Route::get('/{offer}', [App\Http\Controllers\Admin\OfferController::class, 'edit'])->middleware(['permission:update offer'])->name('admin.sponsors.offers.edit');
		Route::patch('/{offer}', [App\Http\Controllers\Admin\OfferController::class, 'update'])->middleware(['permission:update offer'])->name('admin.sponsors.offers.update');
		Route::delete('/{offer}', [App\Http\Controllers\Admin\OfferController::class, 'destroy'])->middleware(['permission:delete offer'])->name('admin.sponsors.offers.destroy');
	});
});

Route::group(['prefix' => 'pages'], function () {
	Route::get('/', [App\Http\Controllers\Admin\PageController::class, 'index'])->middleware(['permission:view pages'])->name('admin.pages.index');
	Route::get('/create', [App\Http\Controllers\Admin\PageController::class, 'create'])->middleware(['permission:create page'])->name('admin.pages.create');
	Route::post('/create', [App\Http\Controllers\Admin\PageController::class, 'store'])->middleware(['permission:create page'])->name('admin.pages.store');
	Route::get('/{page}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->middleware(['permission:update page'])->name('admin.pages.edit');
	Route::patch('/{page}', [App\Http\Controllers\Admin\PageController::class, 'update'])->middleware(['permission:update page'])->name('admin.pages.update');
	Route::delete('/{page}', [App\Http\Controllers\Admin\PageController::class, 'destroy'])->middleware(['permission:delete page'])->name('admin.pages.destroy');
});

Route::group(['prefix' => 'departments'], function () {
	Route::get('/', [App\Http\Controllers\Admin\DepartmentController::class, 'index'])->middleware(['permission:view departments'])->name('admin.departments.index');
	Route::get('/create', [App\Http\Controllers\Admin\DepartmentController::class, 'create'])->middleware(['permission:create department'])->name('admin.departments.create');
	Route::post('/create', [App\Http\Controllers\Admin\DepartmentController::class, 'store'])->middleware(['permission:create department'])->name('admin.departments.store');
	Route::get('/{department}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->middleware(['permission:update department'])->name('admin.departments.edit');
	Route::get('/{department}/members', [App\Http\Controllers\Admin\DepartmentController::class, 'viewMembers'])->middleware(['permission:view departments'])->name('admin.departments.members');
	Route::patch('/{department}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->middleware(['permission:update department'])->name('admin.departments.update');
	Route::delete('/{department}', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy'])->middleware(['permission:delete department'])->name('admin.departments.destroy');
});

Route::group(['prefix' => 'users'], function () {
	Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->middleware(['permission:view users'])->name('admin.users.index');
	Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->middleware(['permission:create user'])->name('admin.users.create');
	Route::post('/create', [App\Http\Controllers\Admin\UserController::class, 'store'])->middleware(['permission:create user'])->name('admin.users.store');
	Route::get('/{user}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->middleware(['permission:update user'])->name('admin.users.edit');
	Route::patch('/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->middleware(['permission:update user'])->name('admin.users.update');
	Route::delete('/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->middleware(['permission:delete user'])->name('admin.users.destroy');

	Route::group(['prefix' => '{user}/department'], function () {
		Route::get('/{department}', [App\Http\Controllers\Admin\UserController::class, 'toggleDepartment'])->middleware(['permission:update user'])->name('admin.users.department.toggle');
	});
});

Route::group(['prefix' => 'roles'], function () {
	Route::get('/', [App\Http\Controllers\Admin\RoleController::class, 'index'])->middleware(['permission:view roles'])->name('admin.roles.index');
	Route::get('/create', [App\Http\Controllers\Admin\RoleController::class, 'create'])->middleware(['permission:create role'])->name('admin.roles.create');
	Route::post('/create', [App\Http\Controllers\Admin\RoleController::class, 'store'])->middleware(['permission:create role'])->name('admin.roles.create');
	Route::get('/{role}', [App\Http\Controllers\Admin\RoleController::class, 'edit'])->middleware(['permission:update role'])->name('admin.roles.edit');
	Route::patch('/{role}', [App\Http\Controllers\Admin\RoleController::class, 'update'])->middleware(['permission:update role'])->name('admin.roles.update');
	Route::delete('/{role}', [App\Http\Controllers\Admin\RoleController::class, 'destroy'])->middleware(['permission:delete role'])->name('admin.roles.destroy');
});

Route::group(['prefix' => 'statistics'], function () {
	Route::get('/', [App\Http\Controllers\Admin\StatisticsController::class, 'index'])->middleware(['permission:view statistics'])->name('admin.statistics.index');
	Route::get('/{sponsor}', [App\Http\Controllers\Admin\StatisticsController::class, 'view'])->middleware(['permission:view statistics'])->name('admin.statistics.view');
});
