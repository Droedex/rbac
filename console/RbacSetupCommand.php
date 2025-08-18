<?php

declare(strict_types=1);

namespace Droedex\RBAC\console;

use Droedex\RBAC\services\Setup\SetDefaultsService;
use Droedex\RBAC\services\Setup\SetUserAdminService;
use Illuminate\Console\Command;

class RbacSetupCommand extends Command
{
    protected $signature = 'rbac:setup-dev';
    protected $description = 'Performs interactive setup of RBAC for the development environment.';

    public function handle(): int
    {
        try {
            $this->info('=== RBAC development setup ===');
            SetDefaultsService::seed();
            $this->line('┌──────────────────────────────────┐');
            $this->line('│  🛡️ ADMIN ROLE CONFIGURATION     │');
            $this->line('├──────────────────────────────────┤');
            $this->info("│ Role:    admin                   │");
            $this->info("│ Scope:   users                   │");
            $this->info("│ Status:  1111                    │");
            $this->line('└──────────────────────────────────┘');

            $userId = (int) $this->ask('Please enter the user ID to assign admin role', 1);
            SetUserAdminService::setAdmin($userId);

            $this->info("Admin role successfully assigned to user (ID: {$userId})");

            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error("Installation failed: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}