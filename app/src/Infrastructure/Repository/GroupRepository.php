<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Application\Repository\GroupRepositoryInterface;
use App\Domain\Entity\Group;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Group findBy(string $id)
 */
class GroupRepository extends AbstractRepository implements GroupRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Group::class);
    }

    public function persist(Group $group): void
    {
        $this->_em->persist($group);
    }

    public function remove(Group $group): void
    {
        $this->_em->remove($group);
    }

    /**
     * @param string $id
     *
     * @return Group & object
     */
    public function get(string $id): Group
    {
        return parent::find($id);
    }
}
