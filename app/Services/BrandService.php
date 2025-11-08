<?php

namespace App\Services;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BrandService
{
    public function __construct(private readonly BrandRepositoryInterface $repository)
    {
    }

    public function listAll(array $filters = []): LengthAwarePaginator
    {
        return $this->repository->getAll($filters);
    }

    public function show(Brand $brand): Brand
    {
        return $this->repository->showWithUnits($brand);
    }

    public function create(array $brandData): Brand
    {
        return $this->repository->save(new Brand($brandData));
    }

    public function update(Brand $brand, array $brandData): Brand
    {
        $brand->fill($brandData);

        return $this->repository->save($brand);
    }

    public function delete(Brand $brand): void
    {
        $this->repository->delete($brand);
    }
}
