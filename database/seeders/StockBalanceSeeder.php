<?php

namespace Database\Seeders;

use App\Models\StockBalance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StockBalance::create([
            'product_variant_id' => 1,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 2,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 3,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 4,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 5,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 6,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 7,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 8,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 9,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 10,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 11,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
        StockBalance::create([
            'product_variant_id' => 12,
            'warehouse_id' => 1,
            'quantity' => 10
        ]);
    }
}
