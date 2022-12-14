<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSeeder extends Seeder
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

		\App\Models\Page::factory()->create([
			'name' => 'Hjem',
			'content' => '<div class="position-relative overflow-hidden p-3 p-md-5 text-center text-white shadow-lg"
        style="background: linear-gradient(27deg, rgba(19, 41, 59, 0.3) 0%, rgba(18, 54, 37, 0.5) 64%, rgba(30, 14, 43, 0.625) 100%), center / cover no-repeat url(\'https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2493&q=80\');">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 font-weight-bold text-white text-uppercase">AASI</h1>
            <p class="lead font-weight-normal">Brødtekst</p>
        </div>
    </div> <div class="container">
		<div class="px-4 py-5 my-5 text-center">
			<h1 class="display-5 fw-bold">Aalborg Studenternes Idrætsforening</h1>
			<div class="col-lg-6 mx-auto">
				<p class="lead mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ratione consectetur
					deleniti quae. Sunt consequuntur ipsam, nulla ipsa consectetur tempore suscipit molestiae
					accusantium
					voluptatem voluptatum expedita quibusdam, laborum soluta odio.</p>
				<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
					<button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
					<button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
				</div>
			</div>
		</div>
	</div> <x-sponsor />',
		]);

		\App\Models\Page::factory()->create([
			'name' => 'Sponsorer',
			'content' => '<div class="container mt-4">
<h1>Sponsorer</h1>

<x-sponsors />

</div>',
		]);
	}
}
