<?php

namespace Tests\Feature\Navigation;

use App\Http\Livewire\Navigation\FooterLink;
use App\Models\Navitem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FooterLinkTest extends TestCase
{
    /** @test */
    public function footer_link_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('navigation.footer-link');
    }

    /** @test */
    public function component_can_load_items_navigation()
    {
        $items = Navitem::factory(3)->create();

        Livewire::test(FooterLink::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->last()->label);
    }
}
