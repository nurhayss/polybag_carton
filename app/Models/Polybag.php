<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Polybag extends Model
{
    use HasFactory;
    protected $table = 'polybags';
    protected $fillable = [
        'order_id',
        'pack',
        'size',
        'length',
        'width',
        'qty_order',
        'isi',
        'kebutuhan',
        'qty_beli',
        'image',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    
}
