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
            'base_uri' => $this->enpoint,
            'headers' => [
                'User-Agent' => 'graphql-proxy/v0.1',
            ]
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
        $result = $this->doRequest($params);

        //check for expected result
        if (!count($result) || !isset($result[0]['model_id'])) {
            throw new \InvalidArgumentException(sprintf('Unable to find car with id %s.', $id));
        }

        return $result[0];
    }

    /**
     * @param string $keyword
     * @return mixed
     */
    public function getTrims($keyword = "")
    {
        $params = [];

        if ($keyword) {
            $params['keyword'] = $keyword;
        }

        $params = array_merge($params, ['cmd' => 'getTrims']);

        $result = $this->doRequest($params);

        if (!isset($result['Trims'])) {
            throw new \RuntimeException('Empty Result');
        }

        return $result['Trims'];
    }

    /**
     * @param $params
     * @return mixed
     */
    public function doRequest($params)
    {
        $response = $this->httpClient->request(
            'GET',
            '',
            ['query' => $params]
        );

        $body = (string)$response->getBody();
        $result = \GuzzleHttp\json_decode($body, true);
        return $result;
    }
}
