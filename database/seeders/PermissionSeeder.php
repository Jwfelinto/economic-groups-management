<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $permissions = [
            'group.view',
            'group.create',
            'group.edit',
            'group.delete',

            'brand.view',
            'brand.create',
            'brand.edit',
            'brand.delete',

            'unit.view',
            'unit.create',
            'unit.edit',
            'unit.delete',

            'employee.view',
            'employee.create',
            'employee.edit',
            'employee.delete',
            'employee.report',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }
    }
}
