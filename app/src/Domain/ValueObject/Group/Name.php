<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\Group;

use App\Domain\Exception\Group\InvalidGroupNameException;

class Name
{
    private string $value;

    public function __construct(string $value)
    {
        if (strlen($value) < 3) {
            throw new InvalidGroupNameException('Group name should have at least 3 chars.');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
