<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Page;

class ForgotPasswordTest extends TestCase
{
	use RefreshDatabase;

	protected function passwordRequestRoute()
	{
		return route('password.request');
	}

	protected function passwordEmailGetRoute()
	{
		return route('password.email');
	}

	protected function passwordEmailPostRoute()
	{
		return route('password.email');
	}

	protected function guestMiddlewareRoute()
	{
		return '/';
	}

	/** @test */
	public function user_can_view_an_email_password_form()
	{
		$response = $this->get($this->passwordRequestRoute());

		$response->assertSuccessful();
		$response->assertViewIs('auth.passwords.email');
	}

	/** @test */
	// public function user_cannot_view_an_email_password_form_when_authenticated()
	// {
	// 	$user = User::factory()->make();

	// 	$response = $this->actingAs($user)->get($this->passwordRequestRoute());

	// 	$response->assertRedirect($this->guestMiddlewareRoute());
	// }

	/** @test */
	public function user_receives_a_mail_with_password_reset_link()
	{
		Notification::fake();

		$user = User::factory()->create([
			'email' => 'john@example.com',
		]);

		$response = $this->post($this->passwordEmailPostRoute(), [
			'email' => 'john@example.com',
		]);

		$this->assertNotNull($token = DB::table('password_resets')->first());
		Notification::assertSentTo($user, ResetPassword::class, function ($notification, $channels) use ($token) {
			return Hash::check($notification->token, $token->token) === true;
		});

		$this->assertTrue(true);
	}

	/** @test */
	public function user_does_not_receive_email_when_not_registered()
	{
		Notification::fake();

		$response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
			'email' => 'nobody@example.com',
		]);

		$response->assertRedirect($this->passwordEmailGetRoute());
		$response->assertSessionHasErrors('email');
		Notification::assertNotSentTo(User::factory()->make(['email' => 'nobody@example.com']), ResetPassword::class);
	}

	/** @test */
	public function email_is_required()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

		$response->assertRedirect($this->passwordEmailGetRoute());
		$response->assertSessionHasErrors('email');
	}

	/** @test */
	public function email_is_a_valid_email()
	{
		$this->withExceptionHandling();

		$response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), [
			'email' => 'invalid-email',
		]);

		$response->assertRedirect($this->passwordEmailGetRoute());
		$response->assertSessionHasErrors('email');
	}
}
