<?php

declare(strict_types=1);

namespace Droedex\RBAC\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

final class RbacDefaultSeeds extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $roleId = DB::table('rbac_roles')->insertGetId([
            'slug' => 'admin', /**  slug  @see  \Illuminate\Database\Schema\ColumnDefinition::unique  */
        ]);

        $unitId =  DB::table('rbac_units')->insertGetId([
            'slug' => 'users', /**  slug  @see  \Illuminate\Database\Schema\ColumnDefinition::unique  */
        ]);

        DB::table('rbac_role_unit_permissions')->insert([
            'role_id' => $roleId,
            'unit_id' => $unitId,
            'permissions' => '1111',
        ]);
    }
}