<?php

declare(strict_types=1);

namespace Droedex\RBAC\utils;

use Droedex\RBAC\services\Actions\ActionServiceInterface;

class InstallerFactory
{
    public static function create(string $class): ActionServiceInterface
    {
        $instance = app()->make($class);

        if (!$instance instanceof ActionServiceInterface) {
            throw new \InvalidArgumentException(
                "{$class} must implement installCommandInterface"
            );
        }

        return $instance;
    }
}