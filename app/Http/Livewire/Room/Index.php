<?php

namespace App\Http\Livewire\Room;

use Livewire\Component;

// Models
use App\Models\Room;

// AuthorizesRequests
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

// Others

class Index extends Component
{
    use AuthorizesRequests;

    public function mount()
    {
        $this->rooms = Room::orderBy('floor', 'asc')->orderBy('name', 'asc')->get();
    }

    public function render()
    {
        $this->authorize('viewAny', Room::class);
        return view('livewire.room.index');
    }
}
