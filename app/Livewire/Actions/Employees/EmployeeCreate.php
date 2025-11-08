<?php

namespace App\Livewire\Actions\Employees;

use App\Livewire\Forms\EmployeeForm;
use App\Services\BrandService;
use App\Services\EmployeeService;
use App\Services\GroupService;
use App\Services\UnitService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class EmployeeCreate extends Component
{
    public EmployeeForm $form;
    public $groups;
    public $brands = [];
    public $units = [];

    public function mount(GroupService $groupService): void
    {
        $this->groups = $groupService->getForSelect();
    }

    public function updatedGroupId(int $groupId, BrandService $brandService): void
    {
        $this->brands = $brandService->getByGroup($groupId);
        $this->units = [];
    }

    public function updatedBrandId(int $brandId, UnitService $unitService): void
    {
        $this->units = $unitService->getByBrand($brandId);
    }

    public function save(EmployeeService $service): void
    {
        $this->validate();

        $service->create($this->form->toArray());

        session()->flash('success', 'Colaborador criado com sucesso!');

        redirect()->route('employees.index');
    }

    public function render(): View
    {
        return view('livewire.employees.create', [
            'groups' => $this->groups,
            'brands' => $this->brands,
            'units' => $this->units,
        ]);
    }
}
