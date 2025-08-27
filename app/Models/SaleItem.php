<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    public function productVariant()
    {
        $this->belongsTo(ProductVariant::class);
    }

    public function sale()
    {
        $this->belongsTo(Sale::class);
    }
}
