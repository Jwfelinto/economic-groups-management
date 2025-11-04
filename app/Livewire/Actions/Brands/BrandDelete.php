<?php

namespace App\Livewire\Actions\Brands;

use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class BrandDelete extends Component
{
    public Brand $brand;
    public bool $confirming = false;

    public function confirmDeletion(): void
    {
        $this->confirming = true;
    }

    public function delete(BrandService $service): void
    {
        $service->delete($this->brand);

        session()->flash('success', "Bandeira '{$this->brand->name}' excluída com sucesso!");
        redirect()->route('brands.index');
    }

    public function render(): View
    {
        return view('livewire.brands.delete');
    }
}
