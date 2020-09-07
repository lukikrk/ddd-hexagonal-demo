<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\Entity;

use App\Domain\Entity\Group;
use App\Domain\ValueObject\Group\Name;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class GroupTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesGroup(): void
    {
        $id = Uuid::uuid4();
        $name = new Name('Group');

        $group = new Group($id, $name);

        $this->assertEquals($id, $group->getId());
        $this->assertEquals($name, $group->getName());
    }
}
