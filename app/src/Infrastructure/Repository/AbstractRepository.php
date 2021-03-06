<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class AbstractRepository extends ServiceEntityRepository
{
    public function getAll(): array
    {
        return parent::findAll();
    }
}
