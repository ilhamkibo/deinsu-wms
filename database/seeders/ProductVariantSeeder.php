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
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNM',
            'size' => 'M',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNL',
            'size' => 'L',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSNXL',
            'size' => 'XL',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBS',
            'size' => 'S',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBM',
            'size' => 'M',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBL',
            'size' => 'L',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSBXL',
            'size' => 'XL',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSEM',
            'size' => 'M',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSEL',
            'size' => 'L',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSGM',
            'size' => 'M',
        ]);

        ProductVariant::create([
            'product_id' => 1,
            'sku' => 'KNSGL',
            'size' => 'L',
        ]);
    }
}
