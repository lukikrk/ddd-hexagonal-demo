<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Repository\UserRepositoryInterface;
use App\Domain\Entity\Group;
use App\Domain\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method User find($id, $lockMode = null, $lockVersion = null)
 */
class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function persist(User $user): void
    {
        $this->_em->persist($user);
    }

    public function get(string $id): User
    {
        return $this->find($id);
    }

    public function getAllByGroup(Group $group): array
    {
        return $this->findBy(['group' => $group]);
    }
}
