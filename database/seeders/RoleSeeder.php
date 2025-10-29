<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $root = Role::firstOrCreate([
            'name' => 'root',
        ]);

        $root->syncPermissions(Permission::all());
    }
}
