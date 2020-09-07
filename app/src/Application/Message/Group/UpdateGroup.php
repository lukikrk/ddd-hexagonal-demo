<?php

declare(strict_types=1);

namespace App\Application\Message\Group;

class UpdateGroup
{
    private string $groupId;

    private string $name;

    public function __construct(string $groupId, string $name)
    {
        $this->groupId = $groupId;
        $this->name = $name;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
