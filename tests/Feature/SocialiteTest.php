<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCase;

class SocialiteTest extends TestCase
{
    use RefreshDatabase;

    protected array $socialLoginRedirects;

    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale(App::currentLocale());

        $this->socialLoginRedirects = [
            'discord' => 'https://discord.com/oauth2/authorize',
            'twitch' => 'https://id.twitch.tv/oauth2/authorize',
        ];
    }

    /** @test */
    public function users_will_be_redirected_to_the_social_platform_login_link()
    {
        foreach ($this->socialLoginRedirects as $socialProvider => $oauthLink) {
            $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');

            $provider->shouldReceive('redirect')->andReturn(new RedirectResponse($oauthLink));
            Socialite::shouldReceive('driver')->with($socialProvider)->andReturn($provider);

            $response = $this->get(route('auth.social.redirect', ['provider' => $socialProvider]));

            $response->assertStatus(302);

            $redirectTo = $response->headers->get('Location') ?? 'location-not-provided';

            $this->assertStringContainsString(
                $oauthLink,
                $redirectTo,
                sprintf(
                    'The Social Login Redirect does not match the expected value for the provider %s. Expected to contain %s but got %s',
                    $socialProvider,
                    $oauthLink,
                    $redirectTo,
                )
            );
        }
    }

    /** @test */
    public function users_can_login_with_socialite()
    {
        $this->withoutExceptionHandling();
        $provider = $this->mock_socialite();

        foreach (['discord', 'twitch'] as $social) {
            Socialite::shouldReceive('driver')->with($social)->andReturn($provider);

            $this->get(route("auth.social.callback", ['provider' => $social]))
                ->assertStatus(302)
                ->assertRedirect(RouteServiceProvider::HOME);

            $this->assertAuthenticated();
            $this->assertDatabaseHas('users', [
                'nickname' => auth()->user()->nickname
            ]);
        }
    }

    /** @test */
    public function users_cannot_login_with_a_already_registered_account_using_socialite()
    {
        $this->withoutExceptionHandling();
        $provider = $this->mock_socialite();

        /**
         * TODO: add data provider to test against same and different social providers, provider_id, different values, etc.
         */
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'provider' => null,
            'provider_id' => null,
        ]);

        foreach (['discord', 'twitch'] as $social) {
            Socialite::shouldReceive('driver')->with($social)->andReturn($provider);

            $this->get(route("auth.social.callback", ['provider' => $social]))
                ->assertRedirect(route('login'))
                ->assertSessionHasErrors('email', __('auth.wrong_method'));

            $this->assertGuest();
            $this->assertDatabaseMissing('users', [
                'email' => $user->email,
                'provider' => $social,
                'provider_id' => 1234567890
            ]);
        }
    }

    private function mock_socialite()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');

        $abstractUser->shouldReceive('getId')
            ->andReturn(1234567890)
            ->shouldReceive('getEmail')
            ->andReturn('test@test.com')
            ->shouldReceive('getNickname')
            ->andReturn('example-nickname')
            ->shouldReceive('getName')
            ->andReturn('Socialite User')
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        return $provider;
    }
}
