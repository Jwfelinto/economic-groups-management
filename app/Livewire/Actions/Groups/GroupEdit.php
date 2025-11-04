<?php

namespace App\Livewire\Actions\Groups;

use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class GroupEdit extends Component
{
    public GroupForm $form;
    public Group $group;

    public function mount(Group $group): void
    {
        $this->group = $group;
        $this->form->fill($group->toArray());
    }

    public function update(GroupService $service): void
    {
        $validated = $this->form->validate();
        $service->update($this->group, $validated);

        session()->flash('success', 'Grupo atualizado com sucesso!');
        redirect()->route('groups.index');
    }

    public function render(): View
    {
        return view('livewire.groups.edit');
    }
}
