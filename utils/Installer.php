<?php

declare(strict_types=1);

namespace Droedex\RBAC\utils;

use Droedex\RBAC\comands\RbacInstallCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Installer
{
    public static function install(): void
    {
        echo "🔧 RBAC installing...\n";

        $command = new RbacInstallCommand();
        $command->setLaravel(app());

        $input = new ArrayInput([]);
        $output = new ConsoleOutput();

        $command->run($input, $output);
    }
}