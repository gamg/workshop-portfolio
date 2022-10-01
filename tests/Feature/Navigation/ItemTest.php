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
}
