<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carton extends Model
{
    use HasFactory;
    protected $table = 'cartons';
    protected $fillable = [
        'order_id',
        'send',
        'packing',
        'quality',
        'length',
        'width',
        'height',
        'volume',
        'qty',
        'weight',
        'total_order',
    ];

    protected function totalOrderFormatted(): Attribute
    {
        return Attribute::get(function () {
            return 'Rp ' . number_format($this->total_order, 0, ',', '.');
        });
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
