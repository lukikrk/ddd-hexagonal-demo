<?php

declare(strict_types=1);

namespace App\Infrastructure\Security;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private ?string $username;

    private ?string $password;

    private array $roles;

    public function __construct(?string $username = null, ?string $password = null, array $roles = [])
    {
        $this->username = $username;
        $this->password = $password;
        $this->roles = $roles;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
