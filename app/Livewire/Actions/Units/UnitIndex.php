<?php

namespace App\Livewire\Actions\Units;

use App\Services\UnitService;
use Livewire\Component;
use Livewire\WithPagination;

class UnitIndex extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $brand_id = null;

    public function render(UnitService $service)
    {
        $units = $service->listAll([
            'search' => $this->search,
            'brand_id' => $this->brand_id,
        ]);

        return view('livewire.units.index', compact('units'));
    }
}
