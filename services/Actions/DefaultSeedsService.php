<?php


declare(strict_types=1);


namespace Droedex\RBAC\services\Actions;

use Droedex\RBAC\database\seeders\RbacDefaultSeeds;

class DefaultSeedsService implements ActionServiceInterface
{

    private $title = 'run default seeds';

    public function getTaskTitle(): string
    {
       return $this->title;
    }

    public function run(): string
    {
        \Artisan::call('db:seed', ['--class' => RbacDefaultSeeds::class]);

        return  ' seeds done! ';
    }
}