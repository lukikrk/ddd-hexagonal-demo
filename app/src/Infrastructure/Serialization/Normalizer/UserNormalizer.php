<?php

declare(strict_types=1);

namespace App\Infrastructure\Serialization\Normalizer;

use App\Domain\Entity\User;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    /**
     * @param User $object
     * @param null $format
     * @param array $context
     *
     * @return array|\ArrayObject|bool|float|int|string|string[]|null
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'id' => $object->getId()->toString(),
            'username' => $object->getUsername()->getValue(),
            'roles' => $object->getRoles()->getValue(),
        ];
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof User;
    }
}
