<?php

namespace AppBundle\GraphQL\Car;

use AppBundle\GraphQL\Type\CarType;
use AppBundle\GraphQL\Resolver\CarResolver;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class CarField extends AbstractContainerAwareField
{
    /**
     * @param FieldConfig $config
     */
    public function build(FieldConfig $config)
    {
        $config->addArguments([
            'id' => new NonNullType(new IntType())
        ]);
    }

    /**
     * @param $value
     * @param array $args
     * @param ResolveInfo $info
     * @return mixed
     */
    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var CarResolver $resolver */
        $resolver = $this->container->get(CarResolver::class);
        return $resolver->findCar($args['id']);
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new CarType();
    }
}
