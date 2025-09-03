<?php

declare(strict_types=1);

namespace Droedex\RBAC;

use Droedex\RBAC\Aplication\Interface\CommandBusInterface;
use Droedex\RBAC\Aplication\Interface\QueryBusInterface;
use Droedex\RBAC\Application\AdminManager;
use Droedex\RBAC\Application\Services\RbacAdmin;
use Droedex\RBAC\Application\Services\RbacCommand;
use Droedex\RBAC\Application\Services\RbacQuery;
use Droedex\RBAC\Domain\Interfaces\AccessManagerInterface;
use Droedex\RBAC\Domain\Services\AccessManager;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RbacServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register any package services.
     */
    public function register(): void
    {

        $this->app->singleton(
            AccessManagerInterface::class,
            AccessManager::class
        );

        $this->app->singleton(AdminManager::class);
        $this->app->singleton(QueryBusInterface::class, RbacQuery::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            AccessManagerInterface::class,
            AdminManager::class,
        ];
    }
}