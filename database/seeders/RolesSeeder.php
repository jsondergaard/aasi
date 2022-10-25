<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$cashierRole = Role::create(['name' => 'cashier']);
		$cashierPermissions = [
			'view users',
			'create user',
			'view dashboard',
		];
		$cashierRole->syncPermissions($cashierPermissions);

		$viceChairmanRole = Role::create(['name' => 'vice-chairman']);
		$viceChairmanPermissions = [
			...$cashierPermissions,
			'update user',
			'delete user',
			'view offers',
			'create offer',
			'update offer',
			'delete offer',
		];
		$viceChairmanRole->syncPermissions($viceChairmanPermissions);

		$chairmanRole = Role::create(['name' => 'chairman']);
		$chairmanPermissions = [
			...$viceChairmanPermissions,
			'view sponsors',
			'create sponsor',
			'update sponsor',
			'delete sponsor',
		];
		$chairmanRole->syncPermissions($chairmanPermissions);

		$superAdminRole = Role::create(['name' => 'super-admin']);
		$superAdminRole->syncPermissions(\Spatie\Permission\Models\Permission::all());
	}
}
