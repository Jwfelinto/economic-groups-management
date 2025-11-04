<?php

namespace App\Livewire\Actions\Brands;

use App\Livewire\Forms\BrandForm;
use App\Services\BrandService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class BrandCreate extends Component
{
    public BrandForm $form;

    public function save(BrandService $service): void
    {
        $validated = $this->form->validate();
        $service->create($validated);

        session()->flash('success', 'Bandeira criada com sucesso!');
        redirect()->route('brands.index');
    }

    public function render(): View
    {
        return view('livewire.brands.create');
    }
}
