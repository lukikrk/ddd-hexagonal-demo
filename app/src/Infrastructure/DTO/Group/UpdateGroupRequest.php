<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO\Group;

use App\Infrastructure\DTO\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class UpdateGroupRequest implements RequestDTOInterface
{
    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private string $name;

    public function __construct(Request $request)
    {
        $parameterBag = $request->request;

        $this->name = (string) $parameterBag->get('name');
    }

    public function getName(): string
    {
        return $this->name;
    }
}
