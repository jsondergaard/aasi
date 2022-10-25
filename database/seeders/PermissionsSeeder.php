<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$permissions = [
			'view dashboard',
			'view users',
			'create user',
			'update user',
			'delete user',
			'view pages',
			'create page',
			'update page',
			'delete page',
			'view sponsors',
			'create sponsor',
			'update sponsor',
			'delete sponsor',
			'view offers',
			'create offer',
			'update offer',
			'delete offer',
		];

		foreach ($permissions as $permission) {
			Permission::create(['name' => $permission]);
		}
	}
}
