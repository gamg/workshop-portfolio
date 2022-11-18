<?php

namespace Tests\Feature\Contact;

use App\Http\Livewire\Contact\Contact;
use App\Models\PersonalInformation;
use App\Models\User;
use Faker\Provider\Person;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function contact_component_can_be_rendered()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('contact.contact');
    }

    /** @test */
    public function component_can_load_contact_email()
    {
        $info = PersonalInformation::factory()->create();

        Livewire::test(Contact::class)->assertSee($info->email);
    }

    /** @test */
    public function only_admin_can_see_contact_action()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Contact::class)
            ->assertStatus(200)
            ->assertSee(__('Edit'));
    }

    /** @test */
    public function guests_cannot_see_contact_action()
    {
        $this->markTestSkipped('uncomment later');

        /*Livewire::test(Contact::class)
            ->assertStatus(200)
            ->assertDontSee(__('Edit'));

        $this->assertGuest();*/
    }

    /** @test */
    public function admin_can_edit_contact_email()
    {
        $user = User::factory()->create();
        $contact = PersonalInformation::factory()->create();

        Livewire::actingAs($user)->test(Contact::class)
            ->set('contact.email', 'tavo@cdp.com')
            ->call('edit');

        $this->assertDatabaseHas('personal_information', [
            'id' => $contact->id,
            'email' => 'tavo@cdp.com'
        ]);
    }

    /** @test */
    public function contact_email_is_required()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Contact::class)
            ->set('contact.email', '')
            ->call('edit')
            ->assertHasErrors(['contact.email' => 'required']);
    }

    /** @test */
    public function contact_email_must_be_a_valid_email()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Contact::class)
            ->set('contact.email', 'tavo@cdp')
            ->call('edit')
            ->assertHasErrors(['contact.email' => 'email']);
    }
}
