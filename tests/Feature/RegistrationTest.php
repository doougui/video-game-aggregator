<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale(App::currentLocale());
    }

    /** @test */
    public function registration_screen_can_be_rendered()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    /** @test */
    public function new_users_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'agreement' => true,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('nickname'));
    }
}
