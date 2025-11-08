<?php

namespace App\Livewire\Actions\Units;

use App\Livewire\Forms\UnitForm;
use App\Services\BrandService;
use App\Services\UnitService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class UnitCreate extends Component
{
    public UnitForm $form;
    public $brands;

    public function mount(BrandService $brandService): void
    {
        $this->brands = $brandService->getForSelect();
    }

    public function save(UnitService $service): void
    {
        $this->validate();

        $service->create($this->form->toArray());

        session()->flash('success', 'Unidade criada com sucesso!');

        redirect()->route('units.index');
    }

    public function render(): View
    {
        return view('livewire.units.create', ['brands' => $this->brands]);
    }
}
