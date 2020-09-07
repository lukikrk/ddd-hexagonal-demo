<?php

declare(strict_types=1);

namespace App\Application\MessageHandler\Group;

use App\Application\Message\Group\UpdateGroup;
use App\Application\Repository\GroupRepositoryInterface;
use App\Domain\Entity\Group;
use App\Domain\ValueObject\Group\Name;

class UpdateGroupHandler
{
    private GroupRepositoryInterface $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function __invoke(UpdateGroup $updateGroup): Group
    {
        $group = $this->groupRepository->get($updateGroup->getGroupId());

        $group->update(new Name($updateGroup->getName()));

        return $group;
    }
}
