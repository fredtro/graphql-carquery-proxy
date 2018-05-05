<?php


namespace AppBundle\CarQuery\Parser;


class ModelParser implements ModelParserInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function parseList($data)
    {
        $models = [];

        foreach ($data as $modelResponse) {
            $models[] = $this->parseSingle($modelResponse);
        }

        return $models;
    }

    /**
     * @param array $data
     * @return array
     */
    public function parseSingle($data)
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