<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleFamilyAdmin = Role::create(['name' => 'family_admin']);
        $roleUser = Role::create(['name' => 'user']);

        $permission = Permission::create(['Family view any']);
        $permission->roles()->attach($roleAdmin);

        $permission = Permission::create(['Family view']);
        $permission->roles()->attach($roleAdmin);
        $permission->roles()->attach($roleFamilyAdmin);

        $permission = Permission::create(['Family attach user']);
        $permission->roles()->attach($roleAdmin);
        $permission->roles()->attach($roleFamilyAdmin);

        $permission = Permission::create(['Family create']);
        $permission->roles()->attach($roleAdmin);
    }
}
