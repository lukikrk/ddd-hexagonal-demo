<?php

declare(strict_types=1);

namespace App\Application\MessageHandler\Group;

use App\Application\Message\Group\CreateGroup;
use App\Application\Repository\GroupRepositoryInterface;
use App\Domain\Entity\Group;
use App\Domain\ValueObject\Group\Name;
use Ramsey\Uuid\Uuid;

class CreateGroupHandler
{
    private GroupRepositoryInterface $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function __invoke(CreateGroup $createGroup): Group
    {
        $group = new Group(Uuid::fromString($createGroup->getId()), new Name($createGroup->getName()));

        $this->groupRepository->persist($group);

        return $group;
    }
}
