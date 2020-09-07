<?php

declare(strict_types=1);

namespace App\Infrastructure\Controller\Group;

use App\Application\Repository\GroupRepositoryInterface;
use App\Infrastructure\Controller\AbstractBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Route("/groups", methods={"GET"})
 */
class GetGroupsController extends AbstractBaseController
{
    private GroupRepositoryInterface $groupRepository;

    public function __construct(
        MessageBusInterface $messageBus,
        SerializerInterface $serializer,
        GroupRepositoryInterface $groupRepository
    ) {
        parent::__construct($messageBus, $serializer);

        $this->groupRepository = $groupRepository;
    }

    public function __invoke(): Response
    {
        return $this->jsonResponse($this->groupRepository->getAll());
    }
}
