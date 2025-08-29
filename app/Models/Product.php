<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'category_id',
        'is_archived',
        'slug',
        'archived_at',
        'photo'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }


    public function getMinPriceAttribute()
    {
        return $this->productVariants->min('price');
    }

    public function getMaxPriceAttribute()
    {
        return $this->productVariants->max('price');
    }

    public function stockBalance()
    {
        return $this->hasManyThrough(StockBalance::class, ProductVariant::class);
    }

    public function getTotalStockAttribute()
    {
        return $this->stockBalance()->sum('quantity');
    }

    // lewat variant ke sale_items
    public function saleItems()
    {
        return $this->hasManyThrough(SaleItem::class, ProductVariant::class);
    }

    // Accessor total quantity terjual
    public function getTotalQuantitySoldAttribute()
    {
        return $this->saleItems->sum('quantity');
    }

    // Accessor total revenue (Rp)
    public function getTotalSalesAmountAttribute()
    {
        return $this->saleItems->sum(function ($item) {
            return $item->quantity * $item->price;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
