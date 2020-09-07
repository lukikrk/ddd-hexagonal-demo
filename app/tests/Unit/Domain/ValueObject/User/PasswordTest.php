<?php

declare(strict_types=1);

namespace App\Tests\Unit\Domain\ValueObject\User;

use App\Domain\ValueObject\User\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase
{
    /**
     * @test
     */
    public function itCreatesPassword(): void
    {
        $password = new Password('password');

        $this->assertEquals('password', $password->getValue());
    }
}
