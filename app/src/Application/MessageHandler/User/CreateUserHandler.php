<?php

declare(strict_types=1);

namespace App\Application\MessageHandler\User;

use App\Application\Factory\UserFactoryInterface;
use App\Application\Message\User\CreateUser;
use App\Application\Repository\GroupRepositoryInterface;
use App\Application\Repository\UserRepositoryInterface;
use App\Domain\Entity\User;
use App\Domain\Enum\RoleEnum;

class CreateUserHandler
{
    private UserFactoryInterface $userFactory;

    private GroupRepositoryInterface $groupRepository;

    private UserRepositoryInterface $userRepository;


    public function __construct(
        UserFactoryInterface $userFactory,
        GroupRepositoryInterface $groupRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->userFactory = $userFactory;
        $this->groupRepository = $groupRepository;
        $this->userRepository = $userRepository;
    }

    public function __invoke(CreateUser $createUser): User
    {
        $user = $this->userFactory->createUser(
            $createUser->getId(),
            $createUser->getUsername(),
            $createUser->getPassword(),
            [RoleEnum::ROLE_USER],
            $this->groupRepository->get($createUser->getGroupId())
        );

        $this->userRepository->persist($user);

        return $user;
    }
}
