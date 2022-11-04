<?php

namespace App\Http\Livewire\Hero;

use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Http\Livewire\Traits\Slideover;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\WithImageFile;
use App\Http\Livewire\Traits\Notification;

class Info extends Component
{
    use Slideover, WithFileUploads, WithImageFile, Notification;

    public PersonalInformation $info;
    public $cvFile = null;

    protected $rules = [
        'info.title' => 'required|max:80',
        'info.description' => 'required|max:250',
        'cvFile' => 'nullable|mimes:pdf|max:1024',
        'imageFile' => 'nullable|image|max:1024',
    ];

    public function updatedCvFile()
    {
        $this->validate([
            'cvFile' => 'mimes:pdf|max:1024',
        ]);
    }

    public function mount()
    {
        $this->info = PersonalInformation::first() ?? new PersonalInformation();
    }

    public function download()
    {
        return Storage::disk('cv')->download($this->info->cv ?? 'my-cv.pdf');
    }

    public function edit()
    {
        $this->validate();

        $this->info->save();

        if ($this->cvFile) {
            $this->deleteFile(disk: 'cv', filename: $this->info->cv);
            $this->info->update(['cv' => $this->cvFile->store('/', 'cv')]);
        }

        if ($this->imageFile) {
            $this->deleteFile(disk: 'hero', filename: $this->info->image);
            $this->info->update(['image' => $this->imageFile->store('/', 'hero')]);
        }

        $this->resetExcept('info');
        $this->notify(__('Information saved successfully!'));
    }

    public function render()
    {
        return view('livewire.hero.info');
    }
}
