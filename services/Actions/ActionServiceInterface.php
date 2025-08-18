<?php

namespace Droedex\RBAC\services\Actions;

interface ActionServiceInterface
{
    public function getTaskTitle(): string;
    public function run(): string;
}