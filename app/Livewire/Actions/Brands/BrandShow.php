<?php

namespace App\Livewire\Actions\Brands;

use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BrandShow extends Component
{
    public Brand $brand;

    public function mount(BrandService $service, Brand $brand): void
    {
        $this->brand = $service->show($brand);
    }

    public function render(BrandService $service): View
    {
        $brand = $service->show($this->brand);

        return view('livewire.brands.show', [
            'brand' => $brand,
            'units' => $brand->units,
        ]);
    }
}
