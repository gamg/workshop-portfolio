<?php

namespace Tests\Feature\Hero;

use App\Http\Livewire\Hero\Image;
use App\Models\PersonalInformation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ImageTest extends TestCase
{
    /** @test */
    public function hero_image_component_can_be_rendered()
    {
        Livewire::test('hero.image')->assertStatus(200);
    }

    /** @test */
    public function component_can_load_hero_image()
    {
        //$info = PersonalInformation::factory()->create();

        Livewire::test('hero.image')->assertSee('default-hero.jpg');
    }
}
