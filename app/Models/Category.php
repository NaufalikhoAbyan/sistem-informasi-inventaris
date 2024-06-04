<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

/**
 * @method static create(array $rules);
 */
class Category extends Model
{
    protected $fillable = [
        'description',
        'category'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
