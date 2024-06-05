<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $validate)
 * @method static find(mixed $item_id)
 */
class Item extends Model
{
    protected $fillable = [
        'brand',
        'series',
        'specification',
        'stock',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function itemIn(): HasMany
    {
        return $this->hasMany(ItemIn::class);
    }

    public function itemOut(): HasMany
    {
        return $this->hasMany(ItemOut::class);
    }
}
