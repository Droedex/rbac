<?php

namespace Droedex\RBAC\services;

interface InstallServiceInterface
{
    public function getTaskTitle(): string;
    public function run(): string;
}