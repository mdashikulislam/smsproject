<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $developer = Role::where('name',DEVELOPER)->first();
        //create and assign permission
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['groupName'];
            for ($j = 0; $j < count($permissions[$i]['permission']); $j++) {
                $permissionData = $permissions[$i]['permission'][$j];
                $permission = Permission::firstOrCreate([
                    'name' => $permissionData['name'],
                ], [
                    'label' => $permissionData['label'],
                    'group' => $permissionGroup,
                    'guard_name' => 'web',
                ]);
                $developer->permissions()->attach($permission->id);
            }
        }
        $exist = User::where('email','developer@gmail.com')->first();
        if (!$exist) {
            $user = User::create([
                'email' => 'developer@gmail.com',
                'name' => 'Developer',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
            ]);
            $user->assignRole($developer);
        }
    }

}
