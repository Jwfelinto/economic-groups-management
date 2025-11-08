<?php

namespace App\Livewire\Actions\Employees;

use App\Livewire\Forms\EmployeeForm;
use App\Models\Employee;
use App\Services\BrandService;
use App\Services\EmployeeService;
use App\Services\GroupService;
use App\Services\UnitService;
use Illuminate\Contracts\View\View;
use Livewire\Component;

final class EmployeeEdit extends Component
{
    public EmployeeForm $form;
    public $groups;
    public $brands;
    public $units;

    public function mount(
        Employee $employee,
        GroupService $groupService,
        BrandService $brandService,
        UnitService $unitService
    ): void {
        $this->form->fillFromModel($employee);

        $this->groups = $groupService->getForSelect();
        $this->brands = $brandService->getByGroup($employee->unit->brand->group_id);
        $this->units = $unitService->getByBrand($employee->unit->brand_id);
    }

    public function update(EmployeeService $service, Employee $employee): void
    {
        $this->validate();

        $service->update($employee, $this->form->toArray());

        session()->flash('success', 'Colaborador atualizado com sucesso!');

        redirect()->route('employees.index');
    }

    public function render(): View
    {
        return view('livewire.employees.edit', [
            'groups' => $this->groups,
            'brands' => $this->brands,
            'units' => $this->units,
        ]);
    }
}
