<?php


namespace AppBundle\GraphQL\Car;

use AppBundle\GraphQL\Resolver\CarResolver;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use AppBundle\GraphQL\Type\CarType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

/**
 * Class SearchCarsField
 * Defines searchCars query
 */
class SearchCarsField extends AbstractContainerAwareField
{
    /**
     * @param FieldConfig $config
     */
    public function build(FieldConfig $config)
    {
        $config
            ->addArgument('keyword', new StringType())
            ->addArgument('make', new StringType())
            ->addArgument('model', new StringType())
            ->addArgument('fuel_type', new StringType())
            ->addArgument('min_power', new IntType())
            ->addArgument('drive', new StringType());
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
        return $resolver->searchCars($args);
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new ListType(new CarType());
    }

    /**
     * @return bool|null|string
     */
    public function getName()
    {
        return 'searchCars';
    }
}
