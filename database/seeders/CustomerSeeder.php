<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Shopee',
            'type' => 'Marketplace',
            'contact_info' => '-',
        ]);

        Customer::create([
            'name' => 'Tokopedia',
            'type' => 'Marketplace',
            'contact_info' => '-',
        ]);

        Customer::create([
            'name' => 'Bazar Ramadhan',
            'type' => 'event',
            'contact_info' => 'Mall PIM',
        ]);
    }
}
