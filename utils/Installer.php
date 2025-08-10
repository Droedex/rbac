<?php

declare(strict_types=1);

namespace Droedex\RBAC\utils;

use Droedex\RBAC\console\RbacInstallCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Installer
{
    public static function install(): void
    {
        $commandClassList = require __DIR__ . '/rbac-install.php';

        $commands = [];

        foreach ($commandClassList as $commandClass) {
            $commands[] = InstallerFactory::create($commandClass);
        }

        $command = new RbacInstallCommand($commands);
        $command->setLaravel(app());

        $input = new ArrayInput([]);
        $output = new ConsoleOutput();

        $command->run($input, $output);
    }
}