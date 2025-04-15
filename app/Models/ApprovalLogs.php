<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApprovalLogs extends Model
{
    use HasFactory;
    protected $table = 'approval_logs';
    protected $fillable = [
        'order_id',
        'user_id',
        'status',
        'description',
        'notes',
        'signature',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
