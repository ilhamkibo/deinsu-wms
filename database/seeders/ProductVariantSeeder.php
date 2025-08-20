<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNS',
            'size' => 'S',
            'color' => 'Navy',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNM',
            'size' => 'M',
            'color' => 'Navy',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNL',
            'size' => 'L',
            'color' => 'Navy',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNXL',
            'size' => 'XL',
            'color' => 'Navy',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBS',
            'size' => 'S',
            'color' => 'Black',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBM',
            'size' => 'M',
            'color' => 'Black',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBL',
            'size' => 'L',
            'color' => 'Black',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBXL',
            'size' => 'XL',
            'color' => 'Black',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSEM',
            'size' => 'M',
            'color' => 'Beige',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSEL',
            'size' => 'L',
            'color' => 'Beige',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSGM',
            'size' => 'M',
            'color' => 'Green Latte',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSGL',
            'size' => 'L',
            'color' => 'Green Latte',
        ]);
    }
}
