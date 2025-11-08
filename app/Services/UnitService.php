<?php

namespace App\Services;

use App\Models\Unit;
use App\Repositories\Interfaces\UnitRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UnitService
{
    public function __construct(private readonly UnitRepositoryInterface $repository)
    {
    }

    public function listAll(array $filters = []): LengthAwarePaginator
    {
        return $this->repository->getAll($filters);
    }

    public function getWithEmployees(Unit $unit): Unit
    {
        return $this->repository->showWithEmployees($unit);
    }

    public function create(array $unitData): Unit
    {
        return $this->repository->save(new Unit($unitData));
    }

    public function update(Unit $unit, array $unitData): void
    {
        $unit->fill($unitData);
        $this->repository->save($unit);
    }

    public function delete(Unit $unit): void
    {
        $this->repository->delete($unit);
    }

    public function getForSelect(): Collection
    {
        return $this->repository->getForSelect();
    }
}
