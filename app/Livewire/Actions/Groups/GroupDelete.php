<?php

namespace App\Livewire\Actions\Groups;

use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class GroupDelete extends Component
{
    public Group $group;
    public bool $confirming = false;

    public function confirmDeletion(): void
    {
        $this->confirming = true;
    }

    public function delete(GroupService $service): void
    {
        $service->delete($this->group);

        session()->flash('success', "Grupo '{$this->group->name}' excluído com sucesso!");
        redirect()->route('groups.index');
    }

    public function render(): View
    {
        return view('livewire.groups.delete');
    }
}
