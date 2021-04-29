<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_be_verified_if_it_uses_social_login()
    {
        $john = User::factory()->create([
            'password' => null,
            'provider' => 'discord',
            'provider_id' => '1234567890',
        ]);

        $this->assertTrue($john->isAuthenticatedWithSocialLogin());

        $sally = User::factory()->create([
            'provider' => null,
            'provider_id' => null,
        ]);

        $this->assertFalse($sally->isAuthenticatedWithSocialLogin());
    }
}
