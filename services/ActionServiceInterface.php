<?php

namespace Droedex\RBAC\services;

interface ActionServiceInterface
{
    public function getTaskTitle(): string;
    public function run(): string;
}