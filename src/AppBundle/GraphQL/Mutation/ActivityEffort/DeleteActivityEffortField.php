<?php

namespace AppBundle\GraphQL\Mutation\ActivityEffort;

use AppBundle\Entity\ActivityEffort;
use AppBundle\GraphQL\Query\ActivityEffort\ActivityEffortQueryBuilderTrait;
use AppBundle\GraphQL\Type\ActivityEffortType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class DeleteActivityEffortField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'id' => new NonNullType(new IntType()),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(ActivityEffort::class);
        $result = $repository->get($value, $args, $info);

        $entityManager->remove($entityManager->getReference(ActivityEffort::class, $args['id']));
        $entityManager->flush();

        return $result;
    }

    public function getType()
    {
        return new ActivityEffortType();
    }

    public function getName()
    {
        return 'activityEffortDelete';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
