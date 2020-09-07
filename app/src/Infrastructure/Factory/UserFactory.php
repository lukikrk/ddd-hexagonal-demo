<?php

declare(strict_types=1);

namespace App\Infrastructure\Factory;

use App\Application\Factory\UserFactoryInterface;
use App\Domain\Entity\Group;
use App\Domain\Entity\User;
use App\Domain\ValueObject\User\Password;
use App\Domain\ValueObject\User\Roles;
use App\Domain\ValueObject\User\Username;
use App\Infrastructure\Security\User as SecurityUser;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFactory implements UserFactoryInterface
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function createUser(string $id, string $username, string $password, array $roles, Group $group): User
    {
        return new User(
            Uuid::fromString($id),
            new Username($username),
            new Password($this->passwordEncoder->encodePassword(new SecurityUser(), $password)),
            new Roles($roles),
            $group
        );
    }
}
