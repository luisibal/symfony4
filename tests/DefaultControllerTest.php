<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/home');
        // var_dump($client->getResponse()->getContent());

        // var_dump($crawler->filter('h1')->text());
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Hello', $crawler->filter('h1')->text());
    }
}
