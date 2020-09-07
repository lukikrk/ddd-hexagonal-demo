<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Group\Name;
use Ramsey\Uuid\UuidInterface;

class Group
{
    private UuidInterface $id;

    private Name $name;

    public function __construct(UuidInterface $id, Name $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function update(Name $name): void
    {
        $this->name = $name;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }
}
