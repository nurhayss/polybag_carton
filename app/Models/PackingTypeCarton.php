<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PackingTypeCarton extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'satuan',
    ];

    public function carton(): HasMany
    {
        return $this->hasMany(Carton::class, 'id', 'packing_type');
    }
}
