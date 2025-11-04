<?php

namespace App\Services;

use App\Models\Unit;
use App\Repositories\Interfaces\UnitRepositoryInterface;
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

    public function create(array $unitData): Unit
    {
        return $this->repository->save(new Unit($unitData));
    }

    public function update(Unit $brand, array $unitData): void
    {
        $brand->fill($unitData);

        $this->repository->save($brand);
    }

    public function delete(Unit $unit): void
    {
        $this->repository->delete($unit);
    }
}
