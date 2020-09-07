<?php

declare(strict_types=1);

namespace App\Application\MessageHandler\Group;

use App\Application\Message\Group\DeleteGroup;
use App\Application\Repository\GroupRepositoryInterface;

class DeleteGroupHandler
{
    private GroupRepositoryInterface $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepository)
    {
        $this->groupRepository = $groupRepository;
    }

    public function __invoke(DeleteGroup $deleteGroup): void
    {
        $group = $this->groupRepository->get($deleteGroup->getGroupId());

        $this->groupRepository->remove($group);
    }
}
