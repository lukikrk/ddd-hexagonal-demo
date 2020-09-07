<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\User;

use App\Application\Message\User\CreateUser;
use App\Infrastructure\Controller\AbstractBaseController;
use App\Infrastructure\DTO\User\RegisterUserRequest;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", methods={"POST"})
 */
class RegisterUserController extends AbstractBaseController
{
    public function __invoke(RegisterUserRequest $request): Response
    {
        $createUser = new CreateUser(
            Uuid::uuid4()->toString(),
            $request->getUsername(),
            $request->getPassword(),
            $request->getGroupId()
        );

        $envelope = $this->messageBus->dispatch($createUser);

        return $this->responseFromEnvelope($envelope);
    }
}
