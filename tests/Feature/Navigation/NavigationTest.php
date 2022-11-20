<?php

namespace Tests\Feature\Navigation;

use App\Http\Livewire\Navigation\Navigation;
use App\Models\Navitem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Livewire\Livewire;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function navigation_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('navigation.navigation');
    }

    /** @test */
    public function component_can_load_items_navigation()
    {
        $items = Navitem::factory(3)->create();

        Livewire::test(Navigation::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->first()->link);
    }

    /** @test */
    public function only_admin_can_see_navigation_actions()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->assertStatus(200)
            ->assertSee(__('Edit'))
            ->assertSee(__('New'));
    }

    /** @test */
    public function guests_cannot_see_navigation_actions()
    {
        Livewire::test(Navigation::class)
            ->assertStatus(200)
            ->assertDontSee(__('Edit'))
            ->assertDontSee(__('New'));

        $this->assertGuest();
    }

    /** @test */
    public function admin_can_edit_items()
    {
        $user = User::factory()->create();

        $items = Navitem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
                ->set('items.0.label', 'My Projects')
                ->set('items.0.link', '#myprojects')
                ->set('items.1.label', 'Contact Me')
                ->set('items.1.link', '#contact-me')
                ->call('edit');

        $this->assertDatabaseHas('navitems', ['id' => $items->first()->id, 'label' => 'My Projects', 'link' => '#myprojects']);
        $this->assertDatabaseHas('navitems', ['id' => $items->last()->id, 'label' => 'Contact Me', 'link' => '#contact-me']);
    }

    /** @test */
    public function admin_can_delete_an_item()
    {
        $user = User::factory()->create();
        $item = Navitem::factory()->create();

        Livewire::actingAs($user)->test(Navigation::class)->call('deleteItem', $item);

        $this->assertDatabaseMissing( 'navitems', ['id' => $item->id]);
    }

    /** @test */
    public function label_of_items_is_required()
    {
        $user = User::factory()->create();
        $items = Navitem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.label', '')
            ->set('items.1.label', '')
            ->call('edit')
            ->assertHasErrors(['items.0.label' => 'required'])
            ->assertHasErrors(['items.1.label' => 'required']);
    }

    /** @test */
    public function link_of_items_is_required()
    {
        $user = User::factory()->create();
        $items = Navitem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.link', '')
            ->set('items.1.link', '')
            ->call('edit')
            ->assertHasErrors(['items.0.link' => 'required'])
            ->assertHasErrors(['items.1.link' => 'required']);
    }

    /** @test */
    public function label_of_items_must_have_a_maximum_of_twenty_characters()
    {
        $user = User::factory()->create();
        $items = Navitem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.label', 'yehdyrgftgkyitjfhvngt')
            ->set('items.1.label', 'yehdyrgftgkyitjfhvngt')
            ->call('edit')
            ->assertHasErrors(['items.0.label' => 'max'])
            ->assertHasErrors(['items.1.label' => 'max']);
    }

    /** @test */
    public function link_of_items_must_have_a_maximum_of_forty_characters()
    {
        $user = User::factory()->create();
        $items = Navitem::factory(2)->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->set('items.0.link', 'yehdyrgftgkyitjfhvngtyehdyrgftgkyitjfhvngt')
            ->set('items.1.link', 'yehdyrgftgkyitjfhvngtyehdyrgftgkyitjfhvngt')
            ->call('edit')
            ->assertHasErrors(['items.0.link' => 'max'])
            ->assertHasErrors(['items.1.link' => 'max']);
    }
}
