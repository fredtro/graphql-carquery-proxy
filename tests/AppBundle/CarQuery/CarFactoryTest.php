<?php


namespace Tests\AppBundle\CarQuery;

use AppBundle\CarQuery\Factory\CarFactory;
use PHPUnit\Framework\TestCase;

class CarFactoryTest extends TestCase
{
    /**
     * mocked cardata from api
     * @var array
     */
    private $carData = [
        'model_id' => 11459,
        'model_name' => 'Viper',
        'make_display' => 'Dodge',
        'model_engine_power_hp' => 506,
        'model_top_speed_kph' => 314,
        'model_engine_fuel' => 'Gasoline',
        'model_length_mm' => 4470,
        'model_width_mm' => 1950,
        'model_height_mm' => 1220
    ];

    /**
     * test if data is converted correctly by factory
     */
    public function testCreate()
    {
        $expected = [
            'id' => 11459,
            'name' => 'Viper',
            'make' => 'Dodge',
            'power' => 506,
            'topSpeed' => 314,
            'fuelType' => 'Gasoline',
            'length' => 4470,
            'width' => 1950,
            'height' => 1220
        ];

        $result = CarFactory::create($this->carData);
        $this->assertEquals($expected, $result);
    }

    /**
     * @expectedException RuntimeException
     */
    public function testMissingDataThrowsException()
    {
        $data = $this->carData;
        unset($data['model_id']);
        CarFactory::create($data);
    }
}
