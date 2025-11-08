<?php

namespace App\Livewire\Actions\Brands;

use App\Livewire\Forms\BrandForm;
use App\Models\Brand;
use App\Services\BrandService;
use App\Services\GroupService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class BrandEdit extends Component
{
    public BrandForm $form;
    public $groups;

    public function mount(Brand $brand, GroupService $groupService): void
    {
        $this->form->fillFromModel($brand);
        $this->groups = $groupService->getForSelect();
    }

    public function update(BrandService $service, Brand $brand): void
    {
        $this->validate();

        $service->update($brand, $this->form->toArray());

        session()->flash('success', 'Bandeira atualizada com sucesso!');

        redirect()->route('brands.index');
    }

    public function render(): View
    {
        return view('livewire.brands.edit', ['groups' => $this->groups]);
    }
}
