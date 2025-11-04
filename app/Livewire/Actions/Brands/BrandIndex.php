<?php

namespace App\Livewire\Actions\Brands;

use App\Services\BrandService;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class BrandIndex extends Component
{
    use WithPagination;

    public string $search = '';
    public ?int $group_id = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(BrandService $service): View
    {
        return view('livewire.brands.index', [
            'brands' => $service->listAll(['search' => $this->search, 'group_id' => $this->group_id]),
        ]);
    }
}
