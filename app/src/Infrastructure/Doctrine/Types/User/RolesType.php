<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Types\User;

use App\Domain\ValueObject\User\Roles;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class RolesType extends Type
{
    /**
     * @param Roles $value
     * @param AbstractPlatform $platform
     *
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        return json_encode($value->getValue());
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Roles(json_decode($value, true));
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        return $platform->getJsonTypeDeclarationSQL($fieldDeclaration);
    }

    public function getName(): string
    {
        return 'roles';
    }
}
