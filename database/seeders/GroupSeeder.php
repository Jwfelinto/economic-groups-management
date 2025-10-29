<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Employee;
use App\Models\Group;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::factory(3)
            ->has(
                Brand::factory()->count(2)
                    ->has(
                        Unit::factory()->count(3)
                            ->has(
                                Employee::factory()->count(8)
                            )
                    )
            )
            ->create();
    }
}
