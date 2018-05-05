<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 05.05.18
 * Time: 12:37
 */

namespace AppBundle\GraphQL\Type;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IdType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class CarType extends AbstractObjectType
{

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config)
    {
        $config->addFields([
            'id' => new NonNullType(new IdType()),
            'name' => new StringType(),
            'make' => new StringType(),
            'trim' => new StringType(),
            'power' => new IntType(),
            'topSpeed' => new IntType()
        ]);
    }
}
