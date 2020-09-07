<?php

declare(strict_types=1);

namespace App\Domain\ValueObject\User;

use App\Domain\Exception\User\InvalidUsernameException;

class Username
{
    private string $value;

    public function __construct(string $value)
    {
        if (strlen($value) < 5) {
            throw new InvalidUsernameException('Username should have at least 5 chars.');
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
