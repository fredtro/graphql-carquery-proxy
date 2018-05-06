<?php

namespace AppBundle\GraphQL\Resolver;

use AppBundle\CarQuery\CarQueryApiInterface;
use AppBundle\CarQuery\Parser\ModelParserInterface;

/**
 * Class CarResolver
 *
 * resolves car query
 */
class CarResolver
{
    /**
     * @var CarQueryApiInterface
     */
    protected $carQueryClient;
    /**
     * @var ModelParserInterface
     */
    private $modelParser;

    /**
     * CarResolver constructor.
     * @param CarQueryApiInterface $carQueryClient
     * @param ModelParserInterface $modelParser
     */
    public function __construct(CarQueryApiInterface $carQueryClient, ModelParserInterface $modelParser)
    {
        $this->carQueryClient = $carQueryClient;
        $this->modelParser = $modelParser;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findCar($id)
    {
        $car = $this->carQueryClient->getModel($id);
        return $this->modelParser->parseSingle($car);
    }

    /**
     * @param $parameter
     * @return array
     */
    public function searchCars(array $parameter = [])
    {
        $cars = $this->carQueryClient->getTrims($parameter);
        return $this->modelParser->parseList($cars);
    }
}
