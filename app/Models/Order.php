<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'order_no',
        'po_no',
        'date',
        'style',
        'qty_garment',
        'buyer',
        'gmt_delivery',
        'arrived_at',
        'location',
        'shipment',
        'packing',
        'plastic_quality',
        'thickness',
        'print_warning',
        'follow_up',
        'follow_up_date',
        'marketing',
        'marketing_date',
        'checked_by',
        'checked_date',
        'purchasing',
        'purchasing_date',
        'created_by',
        'created_date',
        'status',
    ];

    public function polybags(): HasMany
    {
        return $this->hasMany(Polybag::class);
    }

    public function cartons(): HasMany
    {
        return $this->hasMany(Carton::class);
    }
    public function approval(): HasMany
    {
        return $this->hasMany(Carton::class, 'id', 'order_id');
    }

    public function setPackingAttribute($value)
    {
        $this->attributes['packing'] = json_encode((array) $value);
    }


    public function getPackingAttribute($value)
    {
        $decoded = json_decode($value, true);
        return is_array($decoded) ? $decoded : [$decoded];
    }
}
