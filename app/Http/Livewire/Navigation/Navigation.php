<?php

namespace App\Http\Livewire\Navigation;

use App\Models\Navitem;
use Livewire\Component;
use App\Http\Livewire\Traits\Notification;

class Navigation extends Component
{
    use Notification;

    public $items;
    public $openSlideover = false;
    public $addNewItem = false;

    protected $listeners = ['deleteItem', 'itemAdded' => 'updateDataAfterAddItem'];

    protected $rules = [
        'items.*.label' => 'required|max:20',
        'items.*.link'  => 'required|max:40',
    ];

    public function mount()
    {
        $this->items = Navitem::all();
    }

    public function openSlide($addNewItem = false)
    {
        $this->addNewItem = $addNewItem;
        $this->openSlideover = true;
    }

    public function updateDataAfterAddItem()
    {
        $this->mount();
        $this->reset('openSlideover');
    }

    public function edit()
    {
        $this->validate();

        foreach ($this->items as $item) {
            $item->save();
        }

        $this->reset('openSlideover');
        $this->notify(__('Menu items updated successfully!'));
    }

    public function deleteItem(Navitem $item)
    {
        $item->delete();
        $this->mount();
        $this->notify(__('Menu item has been deleted.'), 'deleteMessage');
    }

    public function render()
    {
        return view('livewire.navigation.navigation');
    }
}
