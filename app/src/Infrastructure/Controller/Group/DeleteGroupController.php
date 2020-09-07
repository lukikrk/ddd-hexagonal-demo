<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Group;

use App\Application\Message\Group\DeleteGroup;
use App\Domain\Entity\Group;
use App\Infrastructure\Controller\AbstractBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/groups", methods={"DELETE"})
 */
class DeleteGroupController extends AbstractBaseController
{
    public function __invoke(Group $group): Response
    {
        $deleteGroup = new DeleteGroup($group->getId()->toString());

        $this->messageBus->dispatch($deleteGroup);

        return $this->jsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
