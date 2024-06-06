<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class ItemImage extends Model
{
    protected $fillable = [
        'filename',
        'item_id'
    ];

    public function Item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
