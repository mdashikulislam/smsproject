<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        $permissions = [
            [
                'groupName'=>'Dashboard',
                'permission'=>[
                    [
                        'label'=>'Dashboard',
                        'name'=>'dashboard'
                    ],
                ]
            ],
            [
                'groupName'=>'Customer List',
                'permission'=>[
                    [
                        'label'=>'Customer List',
                        'name'=>'customer.list'
                    ],
                    [
                        'label'=>'Customer Create',
                        'name'=>'customer.create'
                    ]
                ]
            ],
        ];
        //create and assign permission
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['groupName'];
            for ($j = 0; $j < count($permissions[$i]['permission']); $j++) {
                $permissionData = $permissions[$i]['permission'][$j];
                Permission::firstOrCreate([
                    'name' => $permissionData['name'],
                ], [
                    'label' => $permissionData['label'],
                    'group' => $permissionGroup,
                    'guard_name' => 'web',
                ]);
            }
        }
    }

}
