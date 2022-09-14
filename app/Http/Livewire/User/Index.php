<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

// Models
use App\Models\User;

// AuthorizesRequests
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

// Others

class Index extends Component
{
    use AuthorizesRequests;

    public $modalItem;
    public $modalConfirmDeleteVisible = false;
    public $modalConfirmRestoreVisible = false;
    public $modalShowVisible = false;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->users = User::withTrashed()->orderBy('name', 'asc')->get();
    }

    public function deleteShowModal($id)
    {
        $this->modalItem = User::withTrashed()->find($id);
        $this->modalConfirmDeleteVisible = true;
    }

    public function delete()
    {
        $user = $this->modalItem;
        $this->authorize('delete', $user);
        if ($user) {
            $user->delete();
            $this->modalConfirmDeleteVisible = false;
            session()->flash('user-deleted');
            $this->emit('refreshComponent');
        } else {
            abort(500);
        }
        $this->modalItem = null;
    }

    public function restoreShowModal($id)
    {
        $this->modalItem = User::withTrashed()->find($id);
        $this->modalConfirmRestoreVisible = true;
    }

    public function restore()
    {
        $user = $this->modalItem;
        $this->authorize('restore', $user);
        if ($user) {
            $user->restore();
            $this->modalConfirmRestoreVisible = false;
            session()->flash('user-restored');
            $this->emit('refreshComponent');
        } else {
            abort(500);
        }
        $this->modalItem = null;
    }

    public function showShowModal($id)
    {
        $this->modalItem = User::withTrashed()->find($id);
        $this->modalShowVisible = true;
    }

    public function render()
    {
        $this->authorize('viewAny', User::class);
        return view('livewire.user.index');
    }
}
