<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carton extends Model
{
    use HasFactory;
    protected $table = 'cartons';
    protected $fillable = [
        'order_id',
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
}
