<?php

declare(strict_types=1);

namespace App\Application\Repository;

use App\Domain\Entity\Group;
use App\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function persist(User $user): void;

    public function getAll(): array;

    public function getAllByGroup(Group $group): array;

    public function get(string $id): User;
}
