<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Types\User;

use App\Domain\ValueObject\User\Password;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class PasswordType extends Type
{
    /**
     * @param Password $value
     * @param AbstractPlatform $platform
     *
     * @return mixed|void
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return $value->getValue();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): Password
    {
        return new Password($value);
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName(): string
    {
        return 'password';
    }
}
