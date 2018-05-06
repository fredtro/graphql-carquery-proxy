<?php


namespace AppBundle\CarQuery\Factory;

class CarFactory
{
    /**
     * @param array $data
     * @return array
     */
    public static function create(array $data)
    {
        return [
            'id' => $data['model_id'],
            'name' => $data['model_name'],
            'make' => $data['make_display'],
            'power' => isset($data['model_engine_power_hp']) ?
                (int)$data['model_engine_power_hp'] : (int)$data['model_engine_power_ps'],
            'topSpeed' => (int )$data['model_top_speed_kph'],
            'fuelType' => $data['model_engine_fuel'],
            'length' => $data['model_length_mm'],
            'width' => $data['model_width_mm'],
            'height' => $data['model_height_mm']
        ];
    }
}
