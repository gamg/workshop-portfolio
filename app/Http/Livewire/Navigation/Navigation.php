<?php

namespace App\Http\Livewire\Navigation;

use App\Models\Navitem;
use Livewire\Component;

class Navigation extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Navitem::all();
    }

    public function render()
    {
        return view('livewire.navigation.navigation');
    }
}
