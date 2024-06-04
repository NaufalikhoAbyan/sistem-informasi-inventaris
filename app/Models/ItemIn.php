<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemIn extends Model
{
    protected $fillable = [
        'in_date',
        'in_quantity'
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
