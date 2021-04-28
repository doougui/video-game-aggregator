<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale(App::currentLocale());
    }

    /** @test */
    public function password_needs_to_be_confirmed_before_profile_screen_is_rendered()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('profiles.edit'));

        $response->assertStatus(302);
        $response->assertRedirect(route('password.confirm'));
    }

    /** @test */
    public function edit_profile_screen_can_be_rendered_after_password_confirmation()
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('password.confirm'), [
            'password' => 'password'
        ]);

        $response = $this->get(route('profiles.edit'));

        $response->assertStatus(200);
    }

    /** @test */
    public function users_can_change_their_profile_information()
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'email' => 'test@test.com',
            'provider' => null,
            'provider_id' => null,
        ]);

        $this->actingAs($user)->post(route('password.confirm'), [
            'password' => 'password'
        ]);

        $newInfo = [
            'name' => $this->faker->name,
            'bio' => $this->faker->paragraph,
            'email' => $this->faker->safeEmail,
        ];

        $this->put(route('profiles.edit'), $newInfo)->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', $newInfo);
    }

    /** @test */
    public function users_authenticated_with_social_login_cannot_change_email_or_password()
    {
        $user = User::factory()->create([
            'email' => 'test@test.com',
            'password' => null,
            'provider' => 'discord',
            'provider_id' => '1234567890',
        ]);

        $this->actingAs($user);

        $newInfo = [
            'email' => 'new@test.com',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ];

        $this->put(route('profiles.edit'), $newInfo);

        $this->assertDatabaseMissing('users', [
            'email' => 'new@test.com',
        ]);

        $this->assertDatabaseMissing('users', [
            'password' => Hash::make('new-password'),
        ]);
    }
}
