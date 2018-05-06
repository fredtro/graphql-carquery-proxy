<?php


namespace AppBundle\CarQuery\Factory;


class CarFactory
{
    /**
     * @param array $data
     * @return array
     */
    public static function create (array $data)
    {
        return [
            'id' => $data['model_id'],
            'name' => $data['model_name'],
            'make' => $data['make_display'],
            'power' => (int) $data['model_engine_power_ps'],
            'topSpeed' => (int )$data['model_top_speed_kph']
        ];
    }
}