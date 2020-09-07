<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\User\Password;
use App\Domain\ValueObject\User\Roles;
use App\Domain\ValueObject\User\Username;
use Ramsey\Uuid\UuidInterface;

class User
{
    private UuidInterface $id;

    private Username $username;

    private Password $password;

    private Roles $roles;

    private Group $group;

    public function __construct(UuidInterface $id, Username $username, Password $password, Roles $roles, Group $group)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
        $this->group = $group;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getRoles(): Roles
    {
        return $this->roles;
    }

    public function getGroup(): Group
    {
        return $this->group;
    }
}
