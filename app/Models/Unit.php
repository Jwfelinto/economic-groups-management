<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Unit extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'brand_id',
        'trade_name',
        'legal_name',
        'cnpj',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
