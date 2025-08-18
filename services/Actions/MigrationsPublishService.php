<?php

declare(strict_types=1);

namespace Droedex\RBAC\services\Actions;

use Illuminate\Support\Facades\File;

class MigrationsPublishService implements ActionServiceInterface
{
    private string $title = 'publishing migrations ...';

    public function getTaskTitle(): string
    {
        return $this->title;
    }

    public function run(): string
    {
        $sourceDir = dirname(__DIR__, 1) . '/database/migrations';
        $destDir = database_path('migrations');

        if (!$sourceDir || !File::exists($sourceDir)) {
            throw new \RuntimeException("Source migrations directory not found: {$sourceDir}");
        }

        $files = File::files($sourceDir);
        if (empty($files)) {
            return 'No migrations to publish.';
        }

        $published = [];

        foreach ($files as $file) {
            $destPath = $destDir . '/' . $file->getFilename();

            if (File::exists($destPath)) {
                continue;
            }

            File::copy($file->getPathname(), $destPath);
            $published[] = $file->getFilename();
        }

        if (empty($published)) {
            return 'All migrations already exist. Skipping...';
        }

        $items = array_map(fn($file) => "- 📄 $file", $published);

        return ' Published migrations: 📂' . "\n" . implode("\n", $items);
    }
}