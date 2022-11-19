<?php

namespace Tests\Feature\Contact;

use App\Http\Livewire\Contact\SocialLink;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\SocialLink as SocialLinkModel;
use Livewire\Livewire;
use Tests\TestCase;

class SocialLinkTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function social_link_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('contact.social-link');
    }

    /** @test */
    public function component_can_load_social_links()
    {
        $links = SocialLinkModel::factory(3)->create();

        Livewire::test(SocialLink::class)
            ->assertSee($links->first()->url)
            ->assertSee($links->first()->icon)
            ->assertSee($links->last()->url)
            ->assertSee($links->last()->icon);
    }

    /** @test */
    public function only_admin_can_see_social_links_actions()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(SocialLink::class)
            ->assertStatus(200)
            ->assertSee(__('New'))
            ->assertSee(__('Edit'));
    }

    /** @test */
    public function guests_cannot_see_social_links_actions()
    {
        $this->markTestSkipped('uncomment later');

        /*Livewire::test(SocialLink::class)
            ->assertStatus(200)
            ->assertDontSee(__('New'))
            ->assertDontSee(__('Edit'));

        $this->assertGuest();*/
    }

    /** @test */
    public function admin_can_add_a_social_link()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(SocialLink::class)
            ->set('socialLink.name', 'Youtube')
            ->set('socialLink.url', 'https://youtube.com/profile')
            ->set('socialLink.icon', 'fa-brands fa-youtube')
            ->call('save');

        $this->assertDatabaseHas('social_links', [
            'name' => 'Youtube',
            'url' => 'https://youtube.com/profile',
            'icon' => 'fa-brands fa-youtube'
        ]);
    }

    /** @test */
    public function admin_can_edit_a_social_link()
    {
        $user = User::factory()->create();
        $socialLink = SocialLinkModel::factory()-create();

        Livewire::actingAs($user)->test(SocialLink::class)
            ->set('socialLinkSelected', $socialLink->id)
            ->set('socialLink.name', 'My Github XD')
            ->set('socialLink.url', 'https://github.com/gamg')
            ->set('socialLink.icon', 'fa-brands fa-github')
            ->save('save');

        $socialLink->refresh();

        $this->assertDatabaseHas('social_links', [
            'id' => $socialLink->id,
            'name' => 'My Github XD',
            'url' => 'https://github.com/gamg',
            'icon' => $socialLink->icon,
        ]);
    }
}
