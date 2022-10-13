<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		\App\Models\User::factory()->create([
			'name' => 'AASI',
			'email' => 'kontakt@aasi.dk',
			'admin_at' => now(),
		]);

		$departments = \App\Models\Page::factory()->create([
			'name' => 'Afdelinger',
			'is_page' => 0,
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Badminton',
			'parent_id' => $departments->id,
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Fodbold',
			'parent_id' => $departments->id,
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Håndbold',
			'parent_id' => $departments->id,
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Svømning',
			'parent_id' => $departments->id,
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Volley',
			'parent_id' => $departments->id,
		]);

		$aboutUs = \App\Models\Page::factory()->create([
			'name' => 'Omkring os',
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Vedtægter',
			'parent_id' => $aboutUs->id,
		]);

		\App\Models\User::factory(10)->create();
		\App\Models\Sponsor::factory(5)->create();
	}
}
