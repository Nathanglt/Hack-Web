<?php
namespace App\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class SerieControllerTest extends WebTestCase
{
    public function testShowHackathonIsUp()
    {
        $client = static::createClient();
        $client->request('GET', '/'); //teste si la route de base fonctionne
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}