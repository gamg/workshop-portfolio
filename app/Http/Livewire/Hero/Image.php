<?php

namespace App\Http\Livewire\Hero;

use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Image extends Component
{
    private string $image = 'default-hero.jpg';

    protected $listeners = ['heroImageUpdated' => 'mount'];

    public function mount()
    {
        $info = PersonalInformation::select('image')->first();

        if (!is_null($info) && !is_null($info->image)) {
            $this->image = $info->image;
        }
    }

    public function getImageUrlProperty()
    {
        return Storage::disk('hero')->url($this->image);
    }

    public function render()
    {
        return view('livewire.hero.image');
    }
}
