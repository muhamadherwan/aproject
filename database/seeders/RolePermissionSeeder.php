<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);
        // Permission::create(['name' => 'delete articles']);
        // Permission::create(['name' => 'publish articles']);
        // Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'LP-ADMIN']);
        $role = Role::create(['name' => 'KV-ADMIN']);
        $role = Role::create(['name' => 'PENSYARAH']);
        $role = Role::create(['name' => 'PELAJAR']);
        $role = Role::create(['name' => 'JPN']);
        $role = Role::create(['name' => 'BPTV']);
        $role = Role::create(['name' => 'LP-PRODUKSI']);
        $role = Role::create(['name' => 'LP-OPERASI']);
        $role = Role::create(['name' => 'LP-UPMPD']);
        $role = Role::create(['name' => 'LP-SPDP']);
        $role = Role::create(['name' => 'PEMERIKSA-AKADEMIK']);
        $role = Role::create(['name' => 'PEMERIKSA-VOKASIONAL']);
        $role = Role::create(['name' => 'PENTAKSIR-AKADEMIK']);


        // $role->givePermissionTo('edit articles');

        // or may be done by chaining
        // $role = Role::create(['name' => 'moderator'])
        //     ->givePermissionTo(['publish articles', 'unpublish articles']);

        // $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
    }
}
