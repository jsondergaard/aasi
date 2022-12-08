<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	protected function successfulLoginRoute()
	{
		return '/';
	}

	protected function loginGetRoute()
	{
		return route('login');
	}

	protected function loginPostRoute()
	{
		return route('login');
	}

	protected function logoutRoute()
	{
		return route('logout');
	}

	protected function successfulLogoutRoute()
	{
		return '/';
	}

	protected function guestMiddlewareRoute()
	{
		return '/';
	}

	/** @test */
	public function user_can_view_a_login_form()
	{
		$response = $this->get($this->loginGetRoute());

		$response->assertSuccessful();
		$response->assertViewIs('auth.login');
	}

	/** @test */
	public function user_cannot_view_a_login_form_when_authenticated()
	{
		$user = User::factory()->make();

		$response = $this->actingAs($user)->get($this->loginGetRoute());

		$response->assertRedirect($this->guestMiddlewareRoute());
	}

	/** @test */
	public function user_can_login_with_correct_credentials()
	{
		$user = User::factory()->create([
			'password' => bcrypt($password = 'i-love-laravel'),
		]);

		$response = $this->post($this->loginPostRoute(), [
			'email' => $user->email,
			'password' => $password,
		]);

		$response->assertRedirect($this->successfulLoginRoute());
		$this->assertAuthenticatedAs($user);
	}

	/** @test */
	public function remember_me_functionality()
	{
		$user = User::factory()->create([
			'password' => bcrypt($password = 'i-love-laravel'),
		]);

		$response = $this->post($this->loginPostRoute(), [
			'email' => $user->email,
			'password' => $password,
			'remember' => 'on',
		]);

		$response->assertRedirect($this->successfulLoginRoute());
		$response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
			$user->id,
			$user->getRememberToken(),
			$user->password,
		]));
		$this->assertAuthenticatedAs($user);
	}

	/** @test */
	public function user_cannot_login_with_incorrect_password()
	{
		$this->withExceptionHandling();

		$user = User::factory()->create([
			'password' => bcrypt('i-love-laravel'),
		]);

		$response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
			'email' => $user->email,
			'password' => 'invalid-password',
		]);

		$response->assertRedirect($this->loginGetRoute());
		$response->assertSessionHasErrors('email');
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_cannot_login_with_email_that_does_not_exist()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
			'email' => 'nobody@example.com',
			'password' => 'invalid-password',
		]);

		$response->assertRedirect($this->loginGetRoute());
		$response->assertSessionHasErrors('email');
		$this->assertTrue(session()->hasOldInput('email'));
		$this->assertFalse(session()->hasOldInput('password'));
		$this->assertGuest();
	}

	/** @test */
	public function user_can_logout()
	{
		$this->be(User::factory()->create());

		$response = $this->post($this->logoutRoute());

		$response->assertRedirect($this->successfulLogoutRoute());
		$this->assertGuest();
	}
}
