<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

		Artisan::call('db:seed --class=PermissionsSeeder');
		Artisan::call('db:seed --class=RolesSeeder');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
};
