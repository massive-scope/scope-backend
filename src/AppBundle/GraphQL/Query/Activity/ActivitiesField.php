<?php

namespace AppBundle\GraphQL\Query\Activity;

use AppBundle\Entity\Activity;
use AppBundle\GraphQL\Type\ActivitiesType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class ActivitiesField extends AbstractContainerAwareField
{
    use ActivityQueryBuilderTrait;

    public function build(FieldConfig $config)
    {
        $this->addArgument('package', new IntType());
        $this->addArgument('title', new StringType());
        $this->addArgument('offset', new IntType());
        $this->addArgument('size', new IntType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Activity::class);

        return $repository->getList(
            $value,
            $args,
            $info
        );
    }

    public function getType()
    {
        return new ActivitiesType();
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
