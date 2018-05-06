<?php


namespace AppBundle\CarQuery\Factory;

/**
 * Class CarFactory
 *
 * Creates car data from CarQuery api response array
 */
class CarFactory
{
    /**
     * @var array
     */
    public static $dataFields = [
        'model_id',
        'model_name',
        'make_display',
        'model_top_speed_kph',
        'model_engine_fuel',
        'model_length_mm',
        'model_width_mm',
        'model_height_mm'
    ];

    /**
     * @param array $data
     * @return array
     */
    public static function create(array $data)
    {
        static::validate($data);

        return [
            'id' => $data['model_id'],
            'name' => $data['model_name'],
            'make' => $data['make_display'],
            'power' => (isset($data['model_engine_power_hp']) ? (int)$data['model_engine_power_hp'] :
                ((isset($data['model_engine_power_ps'])) ? (int)$data['model_engine_power_ps'] : 0)),
            'topSpeed' => (int )$data['model_top_speed_kph'],
            'fuelType' => $data['model_engine_fuel'],
            'length' => (int)$data['model_length_mm'],
            'width' => (int)$data['model_width_mm'],
            'height' => (int)$data['model_height_mm']
        ];
    }

    /**
     * check if all fields included - except power, this is handled with a 0 in code
     * @param $data
     */
    public static function validate($data)
    {
        $missingKeys = array_diff(static::$dataFields, array_keys($data));
        if (count($missingKeys) > 0) {
            throw new \RuntimeException('Missing data.');
        }
    }
}
