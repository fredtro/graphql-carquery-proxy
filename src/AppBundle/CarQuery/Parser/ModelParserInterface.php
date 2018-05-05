<?php


namespace AppBundle\CarQuery\Parser;

/**
 * Interface ParserInterface
 */
interface ModelParserInterface
{
    /**
     * @param $data
     * @return array
     */
    public function parseList($data);

    /**
     * @param $data
     * @return array
     */
    public function parseSingle($data);
}