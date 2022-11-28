<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PageFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		$faker = \Faker\Factory::create();
		$faker->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider($faker));

		return [
			'name' => fake()->company(),
			'content' => $faker->markdown(),
			'author_id' => User::firstOrFail()->id,
			'parent_id' => null,
			'is_page' => 1,
			'created_at' => $this->faker->dateTimeBetween('-1 week'),
		];
	}
}
