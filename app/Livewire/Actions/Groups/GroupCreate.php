<?php

namespace App\Livewire\Actions\Groups;

use App\Livewire\Forms\GroupForm;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class GroupCreate extends Component
{
    public GroupForm $form;

    public function save(GroupService $service): void
    {
        $this->validate();

        $service->create($this->form->toArray());

        session()->flash('success', 'Grupo criado com sucesso!');

        redirect()->route('groups.index');
    }

    public function render(): View
    {
        return view('livewire.groups.create');
    }
}
