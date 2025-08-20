<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'name' => 'Prima Garmindo',
            'contact_info' => 'Elisa, Jl. Raya Kaliurang KM 6, Tegal, Kota Tegal, Jawa Tengah 52153',
        ]);
    }
}
