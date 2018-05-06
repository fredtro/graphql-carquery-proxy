<?php


namespace Tests\AppBundle\GraphQL;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EndpointTest extends WebTestCase
{
    /**
     * whitesmoke test on endpoint
     */
    public function testEndpointAvailable()
    {
        $client = static::createClient();
        $client->request('GET', '/graphql');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}