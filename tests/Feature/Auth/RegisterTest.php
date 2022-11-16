<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	protected function successfulRegistrationRoute()
	{
		return route('home');
	}

	protected function registerGetRoute()
	{
		return route('register');
	}

	protected function registerPostRoute()
	{
		return route('register');
	}

	protected function guestMiddlewareRoute()
	{
		return route('home');
	}

	/** @test */
	public function user_can_view_a_registration_form()
	{
		$response = $this->get($this->registerGetRoute());

		$response->assertSuccessful();
		$response->assertViewIs('auth.register');
	}

	/** @test */
	public function user_cannot_view_a_registration_form_when_authenticated()
	{
		$user = factory(User::class)->make();

		$response = $this->actingAs($user)->get($this->registerGetRoute());

		$response->assertRedirect($this->guestMiddlewareRoute());
	}

	/** @test */
	public function user_can_register()
	{
		Event::fake();

		$response = $this->post($this->registerPostRoute(), [
			'username' => 'JohnDoe',
			'email' => 'john@example.com',
			'gender' => 'male',
			'born_at' => '1995-10-13 01:51:28',
			'postcode' => '9000',
			'password' => 'i-love-laravel',
			'password_confirmation' => 'i-love-laravel',
		]);

		$response->assertRedirect($this->successfulRegistrationRoute());
		$this->assertCount(1, $users = User::all());
		$this->assertAuthenticatedAs($user = $users->first());
		$this->assertEquals('JohnDoe', $user->username);
		$this->assertEquals('john@example.com', $user->email);
		$this->assertTrue(Hash::check('i-love-laravel', $user->password));
		Event::assertDispatched(Registered::class, function ($e) use ($user) {
			return $e->user->id === $user->id;
		});
	}

	/** @test */
	public function user_cannot_register_without_username()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
			'username' => '',
			'email' => 'john@example.com',
			'password' => 'i-love-laravel',
			'password_confirmation' => 'i-love-laravel',
		]);

		$users = User::all();

		$this->assertCount(0, $users);
		$response->assertRedirect($this->registerGetRoute());
		$response->assertSessionHasErrors('username');
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_cannot_register_without_email()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
			'username' => 'John Doe',
			'email' => '',
			'password' => 'i-love-laravel',
			'password_confirmation' => 'i-love-laravel',
		]);

		$users = User::all();

		$this->assertCount(0, $users);
		$response->assertRedirect($this->registerGetRoute());
		$response->assertSessionHasErrors('email');
		$this->assertTrue(session()->hasOldInput('username'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_cannot_register_with_invalid_email()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
			'username' => 'JohnDoe',
			'email' => 'invalid-email',
			'password' => 'i-love-laravel',
			'password_confirmation' => 'i-love-laravel',
		]);

		$users = User::all();

		$this->assertCount(0, $users);
		$response->assertRedirect($this->registerGetRoute());
		$response->assertSessionHasErrors('email');
		$this->assertTrue(session()->hasOldInput('username'));
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_cannot_register_without_password()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
			'username' => 'JohnDoe',
			'email' => 'john@example.com',
			'password' => '',
			'password_confirmation' => '',
		]);

		$users = User::all();

		$this->assertCount(0, $users);
		$response->assertRedirect($this->registerGetRoute());
		$response->assertSessionHasErrors('password');
		$this->assertTrue(session()->hasOldInput('username'));
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_cannot_register_without_password_confirmation()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
			'username' => 'JohnDoe',
			'email' => 'john@example.com',
			'password' => 'i-love-laravel',
			'password_confirmation' => '',
		]);

		$users = User::all();

		$this->assertCount(0, $users);
		$response->assertRedirect($this->registerGetRoute());
		$response->assertSessionHasErrors('password');
		$this->assertTrue(session()->hasOldInput('username'));
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_cannot_register_with_passwords_not_matching()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->registerGetRoute())->post($this->registerPostRoute(), [
			'username' => 'JohnDoe',
			'email' => 'john@example.com',
			'password' => 'i-love-laravel',
			'password_confirmation' => 'i-love-symfony',
		]);

		$users = User::all();

		$this->assertCount(0, $users);
		$response->assertRedirect($this->registerGetRoute());
		$response->assertSessionHasErrors('password');
		$this->assertTrue(session()->hasOldInput('username'));
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}
}
