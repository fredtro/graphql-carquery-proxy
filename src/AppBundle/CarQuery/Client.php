<?php

namespace AppBundle\CarQuery;

use GuzzleHttp\Client as HttpClient;

class Client implements CarQueryApiInterface
{
    /**
     * @var string
     */
    private $enpoint = 'https://www.carqueryapi.com/api/0.3/?callback=?';

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * ApiClient constructor.
     */
    public function __construct()
    {
        $this->httpClient = new HttpClient([
            'base_uri' => $this->enpoint
        ]);
    }

    /**
     * @param $id
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getModel($id)
    {
        $params = [
            'cmd' => 'getModel',
            'model' => $id
        ];

        $headers = [
            'User-Agent' => 'private-graphql-proxy/v1.0',
        ];

        $response = $this->httpClient->request(
            'GET',
            '',
            [
                'headers' => $headers,
                'query' => $params
            ]
        );

        $body = (string)$response->getBody();
        $result = \GuzzleHttp\json_decode($body, true);

        if (!count($result) || !isset($result[0]['model_id'])) {
            throw new \InvalidArgumentException(sprintf('Unable to find car with id %s.', $id));
        }

        return $result[0];
    }
}
