<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Bersihkan cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Buat daftar permission
        $permissions = [
            'view products',
            'create products',
            'edit products',
            'delete products',
            'manage users',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // 2. Buat role dan assign permission
        $superAdminRole = Role::firstOrCreate(['name' => 'superadmin']);
        $superAdminRole->givePermissionTo(Permission::all()); // semua permission

        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $editorRole->givePermissionTo(['view products', 'create products', 'edit products']);

        $viewerRole = Role::firstOrCreate(['name' => 'viewer']);
        $viewerRole->givePermissionTo(['view products']);

        // 3. Assign role ke user pertama
        $user = User::first();
        if ($user) {
            $user->assignRole('superadmin');
        }
    }
}
