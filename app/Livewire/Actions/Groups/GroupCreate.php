<?php

namespace App\Livewire\Actions\Groups;

use App\Livewire\Forms\GroupForm;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;

class GroupCreate extends Component
{
    public GroupForm $form;

    public function save(GroupService $service): RedirectResponse
    {
        $service->create($this->form->validated());
        session()->flash('success', 'Group created successfully.');

        return redirect()->route('groups.index');
    }

    public function render(): View
    {
        return view('livewire.groups.create');
    }
}
