<?php

namespace App\Services;

use App\Jobs\ProcessEmployeeExport;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Bus;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EmployeeService
{
    public function __construct(private readonly EmployeeRepositoryInterface $repository)
    {
    }

    public function listAll(array $filters = []): LengthAwarePaginator
    {
        return $this->repository->getAll($filters);
    }

    public function show(Employee $employee): Employee
    {
        return $this->repository->show($employee);
    }

    public function create(array $employeeData): Employee
    {
        return $this->repository->save(new Employee($employeeData));
    }

    public function update(Employee $brand, array $employeeData): Employee
    {
        $brand->fill($employeeData);

        return $this->repository->save($brand);
    }

    public function delete(Employee $employee): void
    {
        $this->repository->delete($employee);
    }

    public function export(array $filters = []): BinaryFileResponse
    {
        Bus::dispatch(new ProcessEmployeeExport($filters));
    }
}
