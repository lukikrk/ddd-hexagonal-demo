<?php

declare(strict_types=1);

namespace App\Tests\Functional\Group;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CreateGroupTest extends WebTestCase
{
    /**
     * @test
     */
    public function itCreatesGroup(): void
    {
        $client = static::createClient();

        $client->request('POST', '/groups', ['name' => 'Group']);

        $this->assertEquals(Response::HTTP_CREATED, $client->getResponse()->getStatusCode());

        $responseContent = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals('Group', $responseContent['data']['name']);
    }

    /**
     * @test
     */
    public function itResponsesWithBadRequestStatusIfGivenDataAreInvalid(): void
    {
        $client = static::createClient();

        $client->request('POST', '/groups', ['name' => 'Gr']);

        $this->assertEquals(Response::HTTP_BAD_REQUEST, $client->getResponse()->getStatusCode());
    }
}
