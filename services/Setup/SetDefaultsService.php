<?php

declare(strict_types=1);

namespace Droedex\RBAC\services\Setup;

use Droedex\RBAC\database\seeders\RbacDefaultSeeds;
use Illuminate\Support\Facades\DB;

class SetDefaultsService
{
    public static function seed(): void
    {
        $roleExists = DB::table('rbac_roles')->where('slug', 'admin')->exists();
        $unitExists = DB::table('rbac_units')->where('slug', 'users')->exists();

        if ($roleExists === false && $unitExists === false) {
            \Artisan::call('db:seed', ['--class' => RbacDefaultSeeds::class]);
        }
    }
}