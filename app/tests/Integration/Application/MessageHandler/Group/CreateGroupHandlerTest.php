<?php

declare(strict_types=1);

namespace App\Tests\Integration\Application\MessageHandler\Group;

use App\Application\Message\Group\CreateGroup;
use App\Application\Repository\GroupRepositoryInterface;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateGroupHandlerTest extends KernelTestCase
{
    /**
     * @test
     */
    public function itCreatesGroup(): void
    {
        self::bootKernel();

        $container = self::$container;

        $messageBus = $container->get(MessageBusInterface::class);

        $groupId = Uuid::uuid4()->toString();

        $createGroup = new CreateGroup($groupId, 'Group');

        $messageBus->dispatch($createGroup);

        $group = $container->get(GroupRepositoryInterface::class)->find($groupId);

        $this->assertNotNull($group);
        $this->assertEquals('Group', $group->getName()->getValue());
    }
}
