<?php

namespace App\Http\Livewire\Traits;

trait Notification
{
    public function notify($message = '', $event = 'notify')
    {
        $this->dispatchBrowserEvent($event, ['message' => $message]);
    }
}
