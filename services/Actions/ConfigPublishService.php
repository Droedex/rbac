<?php

declare(strict_types=1);

namespace Droedex\RBAC\services\Actions;

use Illuminate\Support\Facades\File;

class ConfigPublishService implements ActionServiceInterface
{
    private string $title = 'publishing config ...';

    public function getTaskTitle(): string
    {
        return $this->title;
    }

    public function run(): string
    {
        $configSource = dirname(__DIR__, 1) . '/config/rbac.php';
        $configDest = config_path('rbac.php');

        if (!$configSource || !File::exists($configSource)) {
            throw new \RuntimeException(" Source config file not found: {$configSource}");
        }

        if (File::exists($configDest)) {
            return ' Config already exists. Skipping...';
        }

        File::copy($configSource, $configDest);

        return ' Config published' . "\n" .
            '    📄 From: ' . $configSource . "\n" .
            '    📂 To:   ' . $configDest;;
    }
}