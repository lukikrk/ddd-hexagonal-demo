<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Group;

use App\Application\Message\Group\CreateGroup;
use App\Infrastructure\Controller\AbstractBaseController;
use App\Infrastructure\DTO\Group\CreateGroupRequest;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/groups", methods={"POST"})
 */
class CreateGroupController extends AbstractBaseController
{
    public function __invoke(CreateGroupRequest $request): Response
    {
        $createGroup = new CreateGroup(Uuid::uuid4()->toString(), $request->getName());

        $envelope = $this->messageBus->dispatch($createGroup);

        return $this->responseFromEnvelope($envelope, Response::HTTP_CREATED);
    }
}
