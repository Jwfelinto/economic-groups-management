<?php

namespace App\Livewire\Actions\Units;

use App\Livewire\Forms\UnitForm;
use App\Models\Unit;
use App\Services\BrandService;
use App\Services\UnitService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class UnitEdit extends Component
{
    public UnitForm $form;
    public $brands;

    public function mount(Unit $unit, BrandService $brandService): void
    {
        $this->form->fillFromModel($unit);
        $this->brands = $brandService->getForSelect();
    }

    public function update(UnitService $service, Unit $unit): void
    {
        $this->validate();

        $service->update($unit, $this->form->toArray());

        session()->flash('success', 'Unidade atualizada com sucesso!');

        redirect()->route('units.index');
    }

    public function render(): View
    {
        return view('livewire.units.edit', ['brands' => $this->brands]);
    }
}
