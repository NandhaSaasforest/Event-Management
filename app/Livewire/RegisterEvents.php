<?php

namespace App\Livewire;

use App\Models\RegisteredEvent;
use Livewire\Component;

class RegisterEvents extends Component
{
    public function render()
    {
        $registeredEvents = RegisteredEvent::all();
        return view('livewire.register-events');
    }
}
