<?php

declare(strict_types=1);

namespace App\Application\Message\User;

class CreateUser
{
    private string $id;

    private string $username;

    private string $password;

    private string $groupId;

    public function __construct(string $id, string $username, string $password, string $groupId)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->groupId = $groupId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getGroupId(): string
    {
        return $this->groupId;
    }
}
