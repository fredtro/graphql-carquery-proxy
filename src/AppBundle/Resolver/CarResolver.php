<?php

namespace AppBundle\Resolver;

use AppBundle\CarQuery\CarQueryApiInterface;

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
     * CarResolver constructor.
     * @param CarQueryApiInterface $carQueryClient
     */
    public function __construct(CarQueryApiInterface $carQueryClient)
    {
        $this->carQueryClient = $carQueryClient;
    }

    /**
     * @param int $id
     * @return array
     */
    public function findCar($id)
    {
        $car = $this->carQueryClient->getModel($id);

        return [
            'id' => $car['model_id'],
            'make' => $car['make_display'],
            'name' => $car['model_name']
        ];
    }
}
