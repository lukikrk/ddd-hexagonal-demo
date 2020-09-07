<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Group;

use App\Application\Message\Group\UpdateGroup;
use App\Domain\Entity\Group;
use App\Infrastructure\Controller\AbstractBaseController;
use App\Infrastructure\DTO\Group\UpdateGroupRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/groups/{id}", methods={"PUT"})
 */
class UpdateGroupController extends AbstractBaseController
{
    public function __invoke(UpdateGroupRequest $request, Group $group): Response
    {
        $updateGroup = new UpdateGroup($group->getId()->toString(), $request->getName());

        $envelope = $this->messageBus->dispatch($updateGroup);

        return $this->responseFromEnvelope($envelope);
    }
}
