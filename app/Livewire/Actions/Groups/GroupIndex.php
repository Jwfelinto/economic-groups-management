<?php

namespace App\Livewire\Actions\Groups;

use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class GroupIndex extends Component
{
    use WithPagination;

    public string $search = '';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(GroupService $service): View
    {
        return view('livewire.groups.index', [
            'groups' => $service->listAll(['search' => $this->search]),
        ]);
    }
}
