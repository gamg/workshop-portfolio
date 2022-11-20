<?php

namespace Tests\Feature\Navigation;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Livewire\Navigation\Item;
use Livewire\Livewire;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function item_can_be_rendered()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Item::class)->assertStatus(200);
    }

    /** @test */
    public function admin_can_add_an_item()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Item::class)
            ->set('item.label', 'My label')
            ->set('item.link', '#mylink')
            ->call('save');

        $this->assertDatabaseHas('navitems', ['label' => 'My label', 'link' => '#mylink']);
    }

    /** @test */
    public function label_is_required()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Item::class)
            ->set('item.label', '')
            ->set('item.link', '#mylink')
            ->call('save')
            ->assertHasErrors(['item.label' => 'required']);
    }

    /** @test */
    public function label_must_have_a_maximum_of_twenty_characters()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Item::class)
            ->set('item.label', 'jdhfjksdhfkhdskjfhkdhfkjdshfdsfhdj')
            ->set('item.link', '#mylink')
            ->call('save')
            ->assertHasErrors(['item.label' => 'max']);
    }

    /** @test */
    public function link_is_required()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Item::class)
            ->set('item.label', 'Mi enlace')
            ->set('item.link', '')
            ->call('save')
            ->assertHasErrors(['item.link' => 'required']);
    }

    /** @test */
    public function link_must_have_a_maximum_of_forty_characters()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Item::class)
            ->set('item.label', 'Hello')
            ->set('item.link', 'jdhfjksdhfkhdskjfhkdhfkjdshfdsfhdjkhdskjfhkdhfkjdshfdsfhdj')
            ->call('save')
            ->assertHasErrors(['item.link' => 'max']);
    }
}
