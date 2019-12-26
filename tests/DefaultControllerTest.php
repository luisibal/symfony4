<?php

namespace App\Tests;

use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    private $entityManager;

    protected function setUp()
    {
        parent::setUp();
        $this->client = static::createClient();

        $this->entityManager = $this->client->getContainer()->get('doctrine.orm.entity_manager');

        $this->entityManager->beginTransaction();
        $this->entityManager->getConnection()->setAutoCommit(false);
    }

    protected function tearDown()
    {
        $this->entityManager->rollback();
        $this->entityManager->close();
        $this->entityManager = null;
    }

    /**
     * @dataProvider provideUrls
     */
    public function testSomething($url)
    {
        $crawler = $this->client->request('GET', $url);

        $this->assertTrue($this->client->getResponse()->isSuccessful());

        $video = $this->entityManager->getRepository(Video::class)->find(2);
        $this->entityManager->remove($video);
        $this->entityManager->flush();

        $this->assertNull($this->entityManager->getRepository(Video::class)->find(2));
    }

    public function provideUrls()
    {
        return [
            ['/home'],
            ['login'],
        ];
    }
}
