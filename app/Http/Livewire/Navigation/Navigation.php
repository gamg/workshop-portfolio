<?php

namespace App\Http\Livewire\Navigation;

use Livewire\Component;

class Navigation extends Component
{
    public $items;

    public function mount()
    {
        //$this->items = Item::get();
    }

    public function render()
    {
        return view('livewire.navigation.navigation');
    }
}
