<?php

namespace App\Http\Livewire\Hero;

use App\Models\PersonalInformation;
use Livewire\Component;

class Info extends Component
{
    public PersonalInformation $info;
    public $cvFile = null;

    public function mount()
    {
        $this->info = PersonalInformation::first() ?? new PersonalInformation();
    }

    public function render()
    {
        return view('livewire.hero.info');
    }
}
