<?php

declare(strict_types=1);

namespace Droedex\RBAC\database\seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RbacDefaultSeeds extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        DB::table('rbac_roles')->insert([
            'slug' => 'admin',
        ]);

        DB::table('rbac_resources')->insert([
            'slug' => 'user',
        ]);
    }
}