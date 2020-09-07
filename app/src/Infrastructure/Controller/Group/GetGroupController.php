<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Group;

use App\Domain\Entity\Group;
use App\Infrastructure\Controller\AbstractBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/groups/{id}", methods={"GET"})
 */
class GetGroupController extends AbstractBaseController
{
    public function __invoke(Group $group): Response
    {
        return $this->jsonResponse($group);
    }
}
