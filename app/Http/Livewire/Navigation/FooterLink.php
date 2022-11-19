<?php

namespace App\Http\Livewire\Navigation;

use App\Models\Navitem;
use Livewire\Component;

class FooterLink extends Component
{
    protected $listeners = ['itemsHaveBeenUpdated' => 'render'];

    public function render()
    {
        $items = Navitem::get();
        return view('livewire.navigation.footer-link', ['items' => $items]);
    }
}
