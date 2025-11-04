<?php

namespace App\Repositories;

use App\Models\Group;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class GroupRepository implements GroupRepositoryInterface
{
    public function __construct(private readonly Group $group)
    {
    }

    public function getAll(array $filters = []): LengthAwarePaginator
    {
        return $this->group
            ->select(['id', 'name', 'created_at'])
            ->withCount('brands')
            ->when(! empty($filters['search']), fn ($q) => $q->where('name', 'like', "% {$filters['search']} %"))
            ->orderBy('name')
            ->paginate(10);
    }

    public function showWithBrands(Group $group): ?Group
    {
        $group->with(['brands' => fn ($q) => $q->select('id', 'name', 'group_id')]);

        return $group;
    }

    public function save(Group $group): Group
    {
        $group->save();

        return $group;
    }

    public function delete(Group $group): void
    {
        $group->delete();
    }

    public function getForSelect(): Collection
    {
        return $this->group->orderBy('name')->get(['id', 'name']);
    }
}