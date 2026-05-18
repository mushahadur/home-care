<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Clear cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 2️⃣ Define group-wise permissions
        $permissions = [
            'roles' => ['list','create','store','show','edit','update','destroy'],
            'permissions' => ['list','create','store','show','edit','update','destroy'],
            'users' => ['list','create','store','show','edit','update','destroy','manage'],
            'products' => ['list','create','store','show','edit','update','destroy'],
            'articles' => ['edit','view'],
            'orders' => ['list','create','store','show','edit','update','destroy'],
            'care-services' => ['list','create','store','show','edit','update','destroy'],
            'blogs' => ['list','create','store','show','edit','update','destroy'],
        ];

        // 3️⃣ Create permissions in DB with group_name
        foreach($permissions as $group => $actions){
            foreach($actions as $action){
                Permission::firstOrCreate([
                    'name' => "{$group}-{$action}",
                    'guard_name' => 'web',
                    'group_name' => $group, // group-wise
                ]);
            }
        }

        // 4️⃣ Define roles and assign permissions automatically from group
        $roles = [
            'super-admin' => ['roles','users','products','articles','orders','care-services'], // all groups
            'admin'       => ['roles','products','articles'], // selected groups
            'user'        => ['articles'], // limited group
        ];

        foreach($roles as $roleName => $groups){
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);

            // Collect permissions for these groups
            $rolePermissions = Permission::whereIn('group_name', $groups)->pluck('name')->toArray();

            $role->syncPermissions($rolePermissions);
        }

        // 5️⃣ Create Super Admin user
        $superAdmin = User::firstOrCreate(
            ['email' => 'mrk@gmail.com'],
            [
                'name' => 'MRK',
                'password' => Hash::make('12345678'),
                'is_verified' => true,
                'default_role' => 'super-admin',
            ]
        );
        $superAdmin->assignRole('super-admin');

        $this->command->info('Roles, Permissions & Super Admin User seeded successfully!');
    }
}