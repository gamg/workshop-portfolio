<?php

namespace Tests\Feature\Hero;

use App\Http\Livewire\Hero\Info;
use App\Models\PersonalInformation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class InfoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function hero_info_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('hero.info');
    }

    /** @test */
    public function component_can_load_hero_information()
    {
        $info = PersonalInformation::factory()->create();

        Livewire::test(Info::class)
                ->assertSee($info->title)
                ->assertSee($info->description);
    }

    /** @test */
    public function only_admin_can_see_hero_action()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Info::class)
                ->assertStatus(200)
                ->assertSee(__('Edit'));
    }

    /** @test */
    public function guests_cannot_see_hero_action()
    {
        $this->markTestSkipped('uncomment later');

        /*Livewire::test(Info::class)
            ->assertStatus(200)
            ->assertDontSee(__('Edit'));

        $this->assertGuest();*/
    }
}
