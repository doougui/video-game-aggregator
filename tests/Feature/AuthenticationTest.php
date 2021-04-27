<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Mockery;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale(App::currentLocale());
    }

    /** @test */
    public function login_screen_can_be_rendered()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    /** @test */
    public function users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    /** @test */
    public function users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $request = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $request->assertSessionHasErrors(['email' => __('auth.failed')]);
    }

    /** @test */
    public function users_can_login_with_socialite()
    {
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

    private function mock_socialite()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');

        $abstractUser->shouldReceive('getId')
            ->andReturn(1234567890)
            ->shouldReceive('getEmail')
            ->andReturn(Str::random(10) . '@test.com')
            ->shouldReceive('getNickname')
            ->andReturn('example-nickname')
            ->shouldReceive('getName')
            ->andReturn('Test User')
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        $provider = Mockery::mock('Laravel\Socialite\Contracts\Provider');
        $provider->shouldReceive('user')->andReturn($abstractUser);

        return $provider;
    }
}
