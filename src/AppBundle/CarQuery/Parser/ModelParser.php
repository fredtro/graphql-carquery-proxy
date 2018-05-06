<?php


namespace AppBundle\CarQuery\Parser;

use AppBundle\CarQuery\Factory\CarFactory;

/**
 * Class ModelParser
 * Delegating response data to factory.
 */
class ModelParser implements ModelParserInterface
{
    /**
     * @param array $data
     * @return array
     */
    public function parseList($data)
    {
        return array_map([$this, 'parseSingle'], $data);
    }

    /**
     * @param array $data
     * @return array
     */
    public function parseSingle($data)
    {
        return CarFactory::create($data);
    }
}
