<?php

declare(strict_types=1);

namespace App\Infrastructure\DTO\User;

use App\Infrastructure\DTO\RequestDTOInterface;
use Symfony\Component\HttpFoundation\Request;

class RegisterUserRequest implements RequestDTOInterface
{
    private string $username;

    private string $password;

    private string $groupId;

    public function __construct(Request $request)
    {
        $parameterBag = $request->request;

        $this->username = (string) $parameterBag->get('username');
        $this->password = (string) $parameterBag->get('password');
        $this->groupId = (string) $parameterBag->get('groupId');
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getGroupId()
    {
        return $this->groupId;
    }
}
