<?php

namespace Tests\Feature\Contact;

use App\Http\Livewire\Contact\Contact;
use App\Models\PersonalInformation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactTest extends TestCase
{
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
}
