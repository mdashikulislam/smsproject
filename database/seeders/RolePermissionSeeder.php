<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        foreach (DEFAULT_ROLE as $data){
            Role::firstOrCreate([
                'name' => $data,
            ],
            [
                'is_default' => 1,
            ]);
        }
    }
}
