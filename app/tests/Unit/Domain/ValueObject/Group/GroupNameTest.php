<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject\Group;

use App\Domain\Exception\Group\InvalidGroupNameException;
use App\Domain\ValueObject\Group\Name;
use PHPUnit\Framework\TestCase;

class GroupNameTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesGroupName(): void
    {
        $name = new Name('Group');

        $this->assertEquals('Group', $name->getValue());
    }

    /**
     * @test
     */
    public function itThrowsExceptionIfInvalidGroupNameWasCreated(): void
    {
        try {
            new Name('a');

            $this->assertTrue(false);
        } catch (\Exception $exception) {
            $this->assertInstanceOf(InvalidGroupNameException::class, $exception);
        }
    }
}
