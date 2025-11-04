<?php

namespace App\Repositories\Interfaces;

use App\Models\Unit;
use Illuminate\Pagination\LengthAwarePaginator;

interface UnitRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function save(Unit $unit): Unit;

    public function delete(Unit $unit): void;
}
