<?php

namespace Database\Seeders;

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
        $adminRole = Role::create(['name' => 'Admin']);
        $permissions = [
            "user.view",
            "user.create",
            "user.edit",
            "user.delete",
            "role.view",
            "role.create",
            "role.edit",
            "role.delete",
            "educationalexperience.edit",
            "educationalexperience.create",
            "educationalexperience.delete",
            "level.edit",
            "level.create",
            "level.delete",
            "period.edit",
            "period.create",
            "period.delete",
            "week.edit",
            "week.create",
            "week.delete",
            "estimate.edit",
            "estimate.create",
            "estimate.delete",
            "competence.edit",
            "competence.create",
            "competence.delete",
            "field.edit",
            "field.create",
            "field.delete",
            "activity.edit",
            "activity.create",
            "activity.delete",
            "form.edit",
            "form.create",
            "form.delete",
        ];
        foreach ($permissions as $key => $value) {
            Permission::create(['name' => $value]);
        }
        $adminRole->syncPermissions(permissions: $permissions);
        $userRole = Role::create(['name' => 'User']);

        $permissions = [
            "teacher.view",
            "teacher.create",
            "teacher.edit",
            "teacher.delete",
        ];
        foreach ($permissions as $key => $value) {
            $adminRole->givePermissionTo(Permission::create(['name' => $value]));
        }
        $userRole->syncPermissions($permissions);
    }
}
