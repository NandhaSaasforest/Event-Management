<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class Dashboard extends Component
{

    public function render()
    {
        $events = Event::all();
        return view('livewire.dashboard', ['events' => $events]);
    }
}
