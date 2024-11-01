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
                'groupName'=>'Users',
                'permission'=>[
                    'users.show',
                    'users.blocked',
                    'users.pending_users',
                    'users.about',
                    'users.friends',
                    'users.photos',
                    'users.chats',
                    'users.reports'
                ]
            ],
            [
                'groupName'=>'Posts',
                'permission'=>[
                    'posts.show',
                    'posts.detail',
                    'posts.delete'
                ]
            ],
            [
                'groupName'=>'Request Type',
                'permission'=>[
                    'request.show',
                    'request_type.show',
                    'request_type.create',
                    'request_type.edit',
                    'request_type.delete'
                ]
            ],
            [
                'groupName'=>'Notification',
                'permission'=>[
                    'notification.send'
                ]
            ],
            [
                'groupName'=>'Settings',
                'permission'=>[
                    'settings.show',
                    'settings.show',
                ]
            ],
            [
                'groupName'=>'Role and permission',
                'permission'=>[
                    'role.show',
                    'role.create',
                    'role.edit',
                    'role.delete',
                    'role.access'
                ]
            ],
            [
                'groupName'=>'Manage Admin',
                'permission'=>[
                    'admin.show',
                    'admin.create',
                    'admin.edit',
                    'admin.delete'
                ]
            ],
            [
                'groupName'=>'Transaction',
                'permission'=>[
                    'transaction'
                ]
            ],
            [
                'groupName'=>'Earning Report',
                'permission'=>[
                    'earning.report'
                ]
            ]
        ];
        //create and assign permission
        for ($i = 0; $i < count($permissions); $i ++){
            $permissionGroup = $permissions[$i]['groupName'];
            for ($j = 0; $j < count($permissions[$i]['permission']);$j++){
                $permission = Permission::firstOrCreate([
                    'name'=>$permissions[$i]['permission'][$j],
                    'label'=>$permissions[$i]['permission'][$j],
                    'group'=>$permissionGroup,
                    'guard_name' => 'web'
                ]);
//                $SuperAdmin->givePermissionTo($permission);
//                $permission->assignRole($SuperAdmin);
            }
        }
    }

}
