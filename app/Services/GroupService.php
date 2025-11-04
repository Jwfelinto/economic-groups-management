<?php

namespace App\Services;

use App\Models\Group;
use App\Repositories\Interfaces\GroupRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class GroupService
{
    public function __construct(private readonly GroupRepositoryInterface $repository)
    {
    }

    public function listAll(array $filters = []): LengthAwarePaginator
    {
        return $this->repository->getAll($filters);
    }

    public function show(int $id): Group
    {
        return $this->repository->showWithBrands($id);
    }

    public function create(array $groupData): Group
    {
        return $this->repository->save(new Group($groupData));
    }

    public function update(Group $group, array $groupDate): void
    {
        $group->fill($groupDate);

        $this->repository->save($group);
    }

    public function delete(Group $group): void
    {
        $this->repository->delete($group);
    }
}