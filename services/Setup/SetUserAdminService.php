<?php

declare(strict_types=1);

namespace Droedex\RBAC\services\Setup;

use Illuminate\Support\Facades\DB;

class SetUserAdminService
{
    public static function setAdmin(int $id): void
    {
        $hasUser = DB::table('users')->where('id', $id)->exists();
        if (!$hasUser) {
            throw new \RuntimeException("user ID:  {$id} not found");
        }

        DB::table('rbac_user_roles')->insert([
            'user_id' => $id,
            'role_id' => 1
        ]);
    }
}