<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\Interfaces\UnitRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class UnitRepository implements UnitRepositoryInterface
{
    public function __construct(private readonly Unit $unit)
    {
    }

    public function getAll(array $filters = []): LengthAwarePaginator
    {
        $pagination = request('pagination', 10);

        return $this->unit->with(['brand', 'employees'])
            ->when(!empty($filters['brand_id']), function ($query) use ($filters) {
                $query->where('brand_id', $filters['brand_id']);
            })
            ->when(!empty($filters['search']), function ($query) use ($filters) {
                $query->where('trade_name', 'like', '%'.$filters['search'].'%')
                    ->orWhere('legal_name', 'like', '%'.$filters['search'].'%')
                    ->orWhere('cnpj', 'like', '%'.$filters['search'].'%');
            })
            ->orderBy('name')
            ->paginate($pagination);
    }

    public function save(Unit $unit): Unit
    {
        $unit->save();

        return $unit;
    }

    public function delete(Unit $unit): void
    {
        $unit->delete();
    }
}