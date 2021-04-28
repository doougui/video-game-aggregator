<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale(App::currentLocale());
    }

    /** @test */
    public function email_verification_alert_can_be_rendered()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get(route('games.index'));

        $response->assertSee(__('Please verify your email address by clicking on the link we emailed to you. If you didn\'t receive the email, we will gladly send you another.'));
        $response->assertStatus(200);
    }

    /** @test */
    public function verification_email_is_sent_after_signing_up()
    {
        Notification::fake();

        Notification::assertNothingSent();

        $this->post(route('register'), [
            'name' => 'SocialiteTest User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agreement' => true,
        ]);

        $this->assertAuthenticated();
        Notification::assertSentTo(request()->user(), VerifyEmail::class);
    }

    /** @test */
    public function verification_email_can_be_resent()
    {
        Notification::fake();

        Notification::assertNothingSent();

        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->actingAs($user)->get(route('games.index'));
        $this->post(route('verification.send'));

        Notification::assertSentTo($user, VerifyEmail::class);
    }

    /** @test */
    public function email_can_be_verified()
    {
        Event::fake();

        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $response = $this->actingAs($user)->get($verificationUrl);

        Event::assertDispatched(Verified::class);
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        $response->assertRedirect(RouteServiceProvider::HOME.'?verified=1');
    }

    /** @test */
    public function email_is_not_verified_with_invalid_hash()
    {
        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1('wrong-email')]
        );

        $this->actingAs($user)->get($verificationUrl);

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}
