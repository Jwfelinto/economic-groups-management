<?php

namespace App\Livewire\Actions\Units;

use App\Models\Unit;
use App\Services\UnitService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class UnitShow extends Component
{
    public Unit $unit;

    public function mount(UnitService $service, Unit $unit): void
    {
        $this->unit = $service->getWithEmployees($unit);
    }

    public function render(): View
    {
        return view('livewire.units.show', ['unit' => $this->unit]);
    }
}
