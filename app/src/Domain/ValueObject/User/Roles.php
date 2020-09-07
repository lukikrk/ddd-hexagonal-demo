<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\Enum\RoleEnum;
use App\Domain\Exception\User\InvalidUserRolesException;

class Roles
{
    private array $value;

    public function __construct(array $value)
    {
        if (array_diff($value, RoleEnum::values())) {
            throw new InvalidUserRolesException(
                sprintf('User roles should be contained in [%s]', implode(', ', RoleEnum::values()))
            );
        }

        $this->value = $value;
    }

    public function getValue(): array
    {
        return $this->value;
    }
}
