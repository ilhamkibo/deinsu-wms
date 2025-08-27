<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'price',
        'size',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stockBalance()
    {
        return $this->hasOne(StockBalance::class);
    }

    public function saleItems()
    {
        return  $this->hasMany(SaleItem::class);
    }

    public function getTotalQuantitySoldAttribute()
    {
        return $this->saleItems->sum("quantity");
    }
}
