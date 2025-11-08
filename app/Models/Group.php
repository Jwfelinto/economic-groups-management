<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class Group extends Model implements Auditable
{
    use AuditableTrait;
    use HasFactory;


    protected $fillable = [
        'name'
    ];

    public function brands(): HasMany
    {
        return $this->hasMany(Brand::class);
    }
}
