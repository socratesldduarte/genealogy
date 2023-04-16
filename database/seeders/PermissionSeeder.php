<?php

namespace Database\Seeders;

use App\Models\User;
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

        $permission = Permission::create(['name' => 'Families view any']);
        $permission->roles()->attach($roleAdmin);

        $permission = Permission::create(['name' => 'Families view']);
        $permission->roles()->attach($roleAdmin);
        $permission->roles()->attach($roleFamilyAdmin);

        $permission = Permission::create(['name' => 'Families create']);
        $permission->roles()->attach($roleAdmin);

        $permission = Permission::create(['name' => 'Families update']);
        $permission->roles()->attach($roleAdmin);
        $permission->roles()->attach($roleFamilyAdmin);
        $permission->roles()->attach($roleUser);

        $permission = Permission::create(['name' => 'Families delete']);
        $permission->roles()->attach($roleAdmin);

        $permission = Permission::create(['name' => 'Families restore']);
        $permission->roles()->attach($roleAdmin);

        $permission = Permission::create(['name' => 'Families force delete']);
        $permission->roles()->attach($roleAdmin);

        $permission = Permission::create(['name' => 'Families attach user']);
        $permission->roles()->attach($roleAdmin);
        $permission->roles()->attach($roleFamilyAdmin);

        $user = User::find(1);
        $user->assignRole('admin');
    }
}
