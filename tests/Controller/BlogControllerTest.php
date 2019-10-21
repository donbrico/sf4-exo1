<?php

namespace App\Tests\Controller;

use App\Controller\BlogController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BlogControllerTest extends WebTestCase
{

    public function test_is_ok_Show()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function test_is_not_ko_Show()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertNotEquals(404, $client->getResponse()->getStatusCode());
    }

}
