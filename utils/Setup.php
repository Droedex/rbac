<?php

declare(strict_types=1);

namespace Droedex\RBAC\utils;

use Droedex\RBAC\console\RbacSetupCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\ConsoleOutput;

class Setup
{
    public static function run(): void
    {
        $command = new RbacSetupCommand();
        $command->setLaravel(app());

        $input = new ArrayInput([]);
        $output = new ConsoleOutput();

        $command->run($input, $output);

        exit;
    }
}