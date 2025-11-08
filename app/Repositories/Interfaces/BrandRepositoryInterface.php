<?php

namespace App\Repositories\Interfaces;

use App\Models\Brand;
use Illuminate\Pagination\LengthAwarePaginator;

interface BrandRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function showWithUnits(Brand $brand): ?Brand;

    public function save(Brand $brand): Brand;

    public function delete(Brand $brand): void;
}
