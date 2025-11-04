<?php

namespace App\Repositories\Interfaces;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface EmployeeRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function show(Employee $employee): Employee;

    public function save(Employee $employee): Employee;

    public function delete(Employee $employee): void;

    public function queryWithFilters(array $filters = []): Builder;


}
