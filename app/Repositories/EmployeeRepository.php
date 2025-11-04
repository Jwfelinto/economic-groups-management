<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function __construct(private readonly Employee $employee)
    {
    }

    public function getAll(array $filters = []): LengthAwarePaginator
    {
        return $this->queryWithFilters($filters)
            ->orderBy('name')
            ->paginate(10);
    }

    public function show(Employee $employee): Employee
    {
        $employee->load(['unit.brand.group']);

        return $employee;
    }

    public function save(Employee $employee): Employee
    {
        $employee->save();

        return $employee;
    }

    public function delete(Employee $employee): void
    {
        $employee->delete();
    }

    public function queryWithFilters(array $filters = []): Builder
    {
        return $this->employee
            ->with([
                'unit:id,name,brand_id',
                'unit.brand:id,name,group_id',
                'unit.brand.group:id,name',
            ])
            ->when(! empty($filters['unit_id']), function (Builder $query) use ($filters): void {
                $query->where('unit_id', $filters['unit_id']);
            })
            ->when(! empty($filters['brand_id']), function (Builder $query) use ($filters): void {
                $query->whereHas('unit.brand', function (Builder $brandQuery) use ($filters): void {
                    $brandQuery->where('id', $filters['brand_id']);
                });
            })
            ->when(! empty($filters['group_id']), function (Builder $query) use ($filters): void {
                $query->whereHas('unit.brand.group', function (Builder $groupQuery) use ($filters): void {
                    $groupQuery->where('id', $filters['group_id']);
                });
            })
            ->when(! empty($filters['search']), function (Builder $query) use ($filters): void {
                $search = $filters['search'];
                $query->where(function (Builder $query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('cpf', 'like', "%{$search}%");
                });
            });
    }
}