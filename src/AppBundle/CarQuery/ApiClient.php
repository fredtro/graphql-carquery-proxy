<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 05.05.18
 * Time: 11:32
 */

namespace AppBundle\CarQuery;

use GuzzleHttp\Client;

class ApiClient implements CarQueryApiInterface
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
        $this->httpClient = new Client([
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
        return \GuzzleHttp\json_decode($body, true);
    }
}
