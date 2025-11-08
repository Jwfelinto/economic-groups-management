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

    public function mount(Group $group): void
    {
        $this->form->fillFromModel($group);
    }

    public function update(GroupService $service, Group $group): void
    {
        $this->validate();

        $service->update($group, $this->form->toArray());

        session()->flash('success', 'Grupo atualizado com sucesso!');

        redirect()->route('groups.index');
    }

    public function render(): View
    {
        return view('livewire.groups.edit');
    }
}
