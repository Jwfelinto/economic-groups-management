<?php

namespace App\Livewire\Actions\Brands;

use App\Livewire\Forms\BrandForm;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class BrandEdit extends Component
{
    public BrandForm $form;
    public Brand $brand;

    public function mount(Brand $brand): void
    {
        $this->brand = $brand;
        $this->form->fill($brand->toArray());
    }

    public function update(BrandService $service): void
    {
        $validated = $this->form->validate();
        $service->update($this->brand, $validated);

        session()->flash('success', 'Bandeira atualizada com sucesso!');
        redirect()->route('brands.index');
    }

    public function render(): View
    {
        return view('livewire.brands.edit');
    }
}
