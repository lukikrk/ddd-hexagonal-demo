<?php

declare(strict_types=1);

namespace App\Application\Factory;

use App\Domain\Entity\Group;
use App\Domain\Entity\User;

interface UserFactoryInterface
{
    public function createUser(string $id, string $username, string $password, array $roles, Group $group): User;
}
