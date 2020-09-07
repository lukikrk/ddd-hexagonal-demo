<?php

declare(strict_types=1);

namespace App\Infrastructure\Serialization\Normalizer;

use App\Application\Repository\UserRepositoryInterface;
use App\Domain\Entity\Group;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GroupNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param Group $object
     * @param null $format
     * @param array $context
     *
     * @return array|\ArrayObject|bool|float|int|string|null
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function normalize($object, $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId()->toString(),
            'name' => $object->getName()->getValue(),
            'users' => $this->normalizer->normalize($this->userRepository->getAllByGroup($object)),
        ];
    }

    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof Group;
    }
}
