<?php

namespace Tests\Feature;

use App\Http\Livewire\ChooseNickname;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\App;
use Livewire\Livewire;
use Tests\TestCase;

class ChooseNicknameTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->refreshApplicationWithLocale(App::currentLocale());
    }

    /** @test */
    public function choose_nickname_page_contains_livewire_component()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->get(route('nickname'))
            ->assertSeeLivewire('choose-nickname');
    }

    /** @test */
    public function choose_nickname_screen_can_be_rendered()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('nickname'));

        $response->assertStatus(200);
    }

    /** @test */
    public function users_can_change_their_nickname()
    {
        $user = User::factory()->create([
            'nickname' => 'old-nickname'
        ]);

        $this->actingAs($user);

        Livewire::test(ChooseNickname::class)
            ->set('nickname', 'new-nickname')
            ->call('updateNickname')
            ->assertHasNoErrors('nickname');

        $this->assertEquals('new-nickname', auth()->user()->nickname);
    }

    /** @test */
    public function users_cannot_choose_a_taken_nickname()
    {
        $john = User::factory()->create([
            'nickname' => 'john'
        ]);

        $sally = User::factory()->create([
            'nickname' => 'sally'
        ]);

        $this->actingAs($john);

        Livewire::test(ChooseNickname::class)
            ->set('nickname', $sally->nickname)
            ->call('updateNickname')
            ->assertHasErrors('nickname');
    }
}
