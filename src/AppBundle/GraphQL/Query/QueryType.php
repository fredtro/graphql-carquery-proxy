<?php

namespace AppBundle\GraphQL\Query;

use AppBundle\GraphQL\Car\CarField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class QueryType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config
            ->addField(new CarField());
    }
}
