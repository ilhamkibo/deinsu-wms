<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Ilham Prima',
            'email' => 'ilham@example.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            CategorySeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            ProductVariantSeeder::class,
            RolePermissionSeeder::class,
            WarehouseSeeder::class,
            SupplierSeeder::class,
            StockBalanceSeeder::class,
        ]);
    }
}
