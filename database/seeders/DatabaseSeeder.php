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
		$admin = \App\Models\User::factory()->create([
			'name' => 'AASI',
			'email' => 'kontakt@aasi.dk',
		]);

		$admin->assignRole('super-admin');

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

		\App\Models\Department::factory()->create([
			'name' => 'Fodbold',
		]);

		\App\Models\Department::factory()->create([
			'name' => 'Stangtennis',
		]);

		\App\Models\User::factory(10)->create()->each(function ($user) {
			$user->departments()->attach(rand(1, 2));
		});

		\App\Models\Sponsor::factory(5)->create()->each(function ($sponsor) {
			\App\Models\Offer::factory(3)->create([
				'sponsor_id' => $sponsor->id,
			]);
		});
	}
}
