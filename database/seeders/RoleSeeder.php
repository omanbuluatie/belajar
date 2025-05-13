<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleWriter = Role::updateOrCreate(['name' => 'Writer']);
        $roleAdmin = Role::updateOrCreate(['name' => 'Admin']);

        $vanViewDashboard = Permission::updateOrCreate(['name' => 'view dashboard']);
        $canViewUser = Permission::updateOrCreate(['name' => 'view users']);

        $roleWriter->givePermissionTo($canViewUser);
        $roleAdmin->givePermissionTo($vanViewDashboard);

        $user = User::find(1);
        $user->assignRole($roleAdmin);

    }
}
