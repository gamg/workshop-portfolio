<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Support\Facades\Storage;

trait WithImageFile
{
    public $imageFile = null;

    public function updatedImageFile()
    {
        $this->verifyTemporaryUrl();

        $this->validate([
            'imageFile' => 'image|max:1024',
        ]);
    }

    private function verifyTemporaryUrl()
    {
        try {
            $this->imageFile->temporaryUrl();
        } catch (\RuntimeException $exception) {
            $this->reset('imageFile');
        }
    }

    private function deleteFile($disk, $filename)
    {
        if ($filename && Storage::disk($disk)->exists($filename)) {
            Storage::disk($disk)->delete($filename);
        }
    }
}
