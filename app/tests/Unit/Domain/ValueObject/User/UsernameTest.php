<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject\User;

use App\Domain\Exception\User\InvalidUsernameException;
use App\Domain\ValueObject\User\Username;
use PHPUnit\Framework\TestCase;

class UsernameTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesUsername(): void
    {
        $username = new Username('superuser');

        $this->assertEquals('superuser', $username->getValue());
    }

    /**
     * @test
     */
    public function itThrowsExceptionIfInvalidGroupNameWasCreated(): void
    {
        try {
            new Username('a');

            $this->assertTrue(false);
        } catch (\Exception $exception) {
            $this->assertInstanceOf(InvalidUsernameException::class, $exception);
        }
    }
}
