<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Songket extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'base_price',
        'colors',
        'sizes',
        'images',
        'is_featured',
        'is_active',
        'stock_quantity',
    ];

    protected $casts = [
        'base_price' => 'decimal:2',
        'colors' => 'array',
        'sizes' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): Attribute
    {
        return Attribute::make(
            get: fn(array $value) => $value[0] ?? '/images/songket-placeholder.jpg'
        );
    }

    public function base_price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => 'Rp ' . number_format($value, 0, ',', '.')
        );
    }
}
