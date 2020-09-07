<?php

declare(strict_types=1);

namespace App\Application\Message\Group;

class DeleteGroup
{
    private string $groupId;

    public function __construct(string $groupId)
    {
        $this->groupId = $groupId;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }
}
