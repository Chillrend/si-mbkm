<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'mhsw.mbkm']);
        Permission::create(['name' => 'dosen.mbkm']);
        Permission::create(['name' => 'dosen.create_pembimbing_user']);
        Permission::create(['name' => 'pembimbing.mbkm']);

        $mhsw = Role::create(['name' => 'mhsw']);
        $mhsw->givePermissionTo('mhsw.mbkm');

        $dosen = Role::create(['name' => 'dosen']);
        $dosen->givePermissionTo('dosen');

        $dosen = Role::create(['name' => 'pembimbing']);
        $dosen->givePermissionTo('dosen');

    }
}
