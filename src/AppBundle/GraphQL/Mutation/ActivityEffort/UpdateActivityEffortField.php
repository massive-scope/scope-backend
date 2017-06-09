<?php

namespace AppBundle\GraphQL\Mutation\ActivityEffort;

use AppBundle\Entity\ActivityEffort;
use AppBundle\GraphQL\Query\ActivityEffort\ActivityEffortQueryBuilderTrait;
use AppBundle\GraphQL\Type\ActivityEffortType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\FloatType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class UpdateActivityEffortField extends AbstractContainerAwareField
{
    use ActivityEffortMapperTrait;
    use ActivityEffortQueryBuilderTrait;

    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'id' => new NonNullType(new IntType()),
                'description' => new StringType(),
                'hours' => new FloatType(),
                'date' => new DateTimeType(),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $activity = $entityManager->find(ActivityEffort::class, $args['id']);
        $this->mapActivityEffort($args, $activity);
        $entityManager->flush();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(ActivityEffort::class);
        $queryBuilder = $repository->createQueryBuilder('entity');

        $queryBuilder->where('entity.id = :id')->setParameter('id', $activity->getId());
        $this->addActivityEffortFields($info->getFieldASTList(), $queryBuilder);

        return $queryBuilder->getQuery()->getSingleResult();
    }

    public function getType()
    {
        return new ActivityEffortType();
    }

    public function getName()
    {
        return 'activityEffortUpdate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
