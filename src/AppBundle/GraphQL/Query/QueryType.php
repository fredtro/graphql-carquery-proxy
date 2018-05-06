<?php

namespace AppBundle\GraphQL\Query;

use AppBundle\GraphQL\Car\CarField;
use AppBundle\GraphQL\Car\SearchCarsField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

/**
 * Class QueryType
 * Represent Query Type (Root Type)
 */
class QueryType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config
            ->addField(new CarField())
            ->addField(new SearchCarsField());
    }
}
