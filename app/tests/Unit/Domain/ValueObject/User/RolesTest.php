<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject\User;

use App\Domain\Enum\RoleEnum;
use App\Domain\Exception\User\InvalidUserRolesException;
use App\Domain\ValueObject\User\Roles;
use PHPUnit\Framework\TestCase;

class RolesTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesRoles(): void
    {
        $roles = new Roles([RoleEnum::ROLE_USER]);

        $this->assertEquals([RoleEnum::ROLE_USER], $roles->getValue());
    }

    /**
     * @test
     */
    public function itThrowsExceptionIfInvalidGroupNameWasCreated(): void
    {
        try {
            new Roles([RoleEnum::ROLE_USER, 'ROLE_CUSTOM']);

            $this->assertTrue(false);
        } catch (\Exception $exception) {
            $this->assertInstanceOf(InvalidUserRolesException::class, $exception);
        }
    }
}
