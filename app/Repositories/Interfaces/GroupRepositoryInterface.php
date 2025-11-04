<?php

namespace App\Repositories\Interfaces;

use App\Models\Group;
use Illuminate\Pagination\LengthAwarePaginator;

interface GroupRepositoryInterface
{
    public function getAll(array $filters = []): LengthAwarePaginator;

    public function showWithBrands(Group $group): ?Group;

    public function save(Group $group): Group;

    public function delete(Group $group): void;
}