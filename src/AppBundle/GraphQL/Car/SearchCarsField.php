<?php


namespace AppBundle\GraphQL\Car;


use AppBundle\Resolver\CarResolver;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\ListType\ListType;
use AppBundle\GraphQL\Type\CarType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class SearchCarsField extends AbstractContainerAwareField
{
    /**
     * @param FieldConfig $config
     */
    public function build(FieldConfig $config)
    {
        $config
            ->addArgument('keyword', new StringType());
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
        return $resolver->searchCars(isset($args['keyword']) ? $args['keyword'] : "");
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