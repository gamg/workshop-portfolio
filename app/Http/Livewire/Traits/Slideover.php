<?php

namespace App\Http\Livewire\Traits;

trait Slideover
{
    public $openSlideover = false;
    public $addNewItem = false;

    public function openSlide($addNewItem = false)
    {
        $this->addNewItem = $addNewItem;
        $this->openSlideover = true;
    }
}
