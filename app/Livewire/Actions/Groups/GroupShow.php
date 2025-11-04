<?php

namespace App\Livewire\Actions\Groups;

use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class GroupShow extends Component
{
    public Group $group;

    public function mount(Group $group): void
    {
        $this->group = $group;
    }

    public function render(GroupService $service): View
    {
        $group = $service->show($this->group);

        return view('livewire.groups.show', [
            'group' => $group,
            'brands' => $group->brands,
        ]);
    }
}
