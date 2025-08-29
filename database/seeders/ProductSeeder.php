<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'sku' => 'KNSN',
            'name' => 'Kemeja Nyaman SS Navy',
            'slug' => 'kemeja-nyaman-ss-navy',
            'category_id' => 1,
        ]);

        Product::create([
            'sku' => 'KNSB',
            'name' => 'Kemeja Nyaman SS Black',
            'slug' => 'kemeja-nyaman-ss-black',
            'category_id' => 1,
        ]);

        Product::create([
            'sku' => 'KNSE',
            'name' => 'Kemeja Nyaman SS Beige',
            'slug' => 'kemeja-nyaman-ss-beige',
            'category_id' => 1,
        ]);

        Product::create([
            'sku' => 'KNSG',
            'name' => 'Kemeja Nyaman SS Green Latte',
            'slug' => 'kemeja-nyaman-ss-green-latte',
            'category_id' => 1,
        ]);
    }
}
