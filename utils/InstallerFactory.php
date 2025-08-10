<?php

declare(strict_types=1);

namespace Droedex\RBAC\utils;

use Droedex\RBAC\services\InstallServiceInterface;

class InstallerFactory
{
    public static function create(string $class): InstallServiceInterface
    {
        $instance = app()->make($class);

        if (!$instance instanceof InstallServiceInterface) {
            throw new \InvalidArgumentException(
                "{$class} must implement installCommandInterface"
            );
        }

        return $instance;
    }
}