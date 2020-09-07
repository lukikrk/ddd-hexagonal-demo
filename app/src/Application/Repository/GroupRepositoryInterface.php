<?php

declare(strict_types=1);

namespace App\Application\Repository;

use App\Domain\Entity\Group;

interface GroupRepositoryInterface
{
    public function persist(Group $group): void;

    public function remove(Group $group): void;

    public function getAll(): array;

    public function get(string $id): Group;
}
