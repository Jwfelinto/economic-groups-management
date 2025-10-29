<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Group extends Model implements Auditable
{
    use AuditableTrait;

    protected $fillable = [
        'name'
    ];

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
}
