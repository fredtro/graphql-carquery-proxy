<?php


namespace Tests\AppBundle\CarQuery;

use AppBundle\CarQuery\Client;
use GuzzleHttp\Client as HttpClient;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class ClientTest extends TestCase
{
    /**
     * testing if all components get called correctly and array with car data is returned
     */
    public function testGetModel()
    {
        $responseData = file_get_contents(__DIR__ . "/fixtures/model.json");
        $cqClient = $this->getMockedClient($responseData);
        $result = $cqClient->getModel(123);

        //check for expected result
        $exp = \GuzzleHttp\json_decode($responseData, true)[0];
        $this->assertEquals($exp, $result);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetModelThrowsException()
    {
        $responseData = "";
        $cqClient = $this->getMockedClient($responseData);
        $cqClient->getModel(123);
    }

    /**
     * testing call stack again, running without exception
     */
    public function testGetTrims()
    {
        $responseData = file_get_contents(__DIR__ . "/fixtures/trims.json");
        $cqClient = $this->getMockedClient($responseData);
        $result = $cqClient->getTrims();

        $this->assertEquals(\GuzzleHttp\json_decode($responseData, true)['Trims'], $result);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetTrimsThrowsException(){
        $responseData = "";
        $cqClient = $this->getMockedClient($responseData);
        $cqClient->getTrims();
    }

    /**
     * Set mocked http client
     *
     * @param $responseData
     * @return Client
     */
    public function getMockedClient($responseData)
    {
        /** @var HttpClient $httpClientMock */
        $httpClientMock = $this->createMock(HttpClient::class);

        //mock response
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($responseData);
        $httpClientMock->method('request')->willReturn($responseMock);

        //build carquery client
        $cqClient = new Client();
        $cqClient->setHttpClient($httpClientMock);

        return $cqClient;
    }

}
