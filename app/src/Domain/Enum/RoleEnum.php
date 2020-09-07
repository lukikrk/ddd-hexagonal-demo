<?php

declare(strict_types=1);

namespace App\Domain\Enum;

use ReflectionClass;

class RoleEnum
{
    public const ROLE_USER = 'ROLE_USER';

    public static function values(): array
    {
        return (new ReflectionClass(__CLASS__))->getConstants();
    }
}
