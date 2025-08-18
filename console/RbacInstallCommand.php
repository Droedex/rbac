<?php

declare(strict_types=1);

namespace Droedex\RBAC\console;

use Droedex\RBAC\services\Actions\ActionServiceInterface;
use Illuminate\Console\Command;

class RbacInstallCommand extends Command
{
    protected $signature = 'rbac:install';
    protected $description = 'Publish config and routes for rbac';

    /** @var ActionServiceInterface[] */
    protected array $commands;

    public function __construct(array $commands)
    {
        parent::__construct();
        $this->commands = $commands;
    }

    public function handle(): int
    {
        $this->line('🔧 Run installing RBAC...');

        try {
            foreach ($this->commands as $command) {
                $this->info('⚙️ ' . $command->getTaskTitle());
                $message = $command->run();
                $this->info('✅ ' . $message);
            }

            $this->info('🎉 Installation complete.');
            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error("Installation failed: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}