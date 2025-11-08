<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class BrandRepository implements BrandRepositoryInterface
{
    public function __construct(private readonly Brand $brand)
    {
    }

    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $pagination = request('pagination', 10);

        return $this->brand->with(['group', 'units'])
            ->when(! empty($filters['group_id']), function ($query) use ($filters) {
                $query->where('group_id', $filters['group_id']);
            })
            ->when(! empty($filters['search']), function ($query) use ($filters) {
                $query->where('name', 'like', '%' . $filters['search'] . '%');
            })
            ->orderBy('name')
            ->paginate($pagination);
    }

    public function showWithUnits(Brand $brand): ?Brand
    {
        $brand->with(['units' => fn ($q) => $q->select('id', 'name', 'brand_id')]);

        return $brand;
    }

    public function save(Brand $brand): Brand
    {
        $brand->save();

        return $brand;
    }

    public function delete(Brand $brand): void
    {
        $brand->delete();
    }
}