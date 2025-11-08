<?php

namespace App\Livewire\Actions\Units;

use App\Livewire\Forms\UnitForm;
use App\Services\UnitService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class UnitCreate extends Component
{
    public UnitForm $form;

    public function save(UnitService $service): void
    {
        $validated = $this->form->validate();
        $service->create($validated);

        session()->flash('success', 'Unidade criada com sucesso!');
        redirect()->route('units.index');
    }

    public function render(): View
    {
        return view('livewire.units.create');
    }
}
