<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            //role
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            //product
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            //warehouse
            'warehouse-list',
            'warehouse-create',
            'warehouse-edit',
            'warehouse-delete',
            //asset
            'asset-list',
            'asset-create',
            'asset-edit',
            'asset-delete',
            //user
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            //peminjaman
            'peminjaman-list',
            'peminjaman-create',
            'peminjaman-edit',
            'peminjaman-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
