<?php

namespace AppBundle\GraphQL\Mutation\ActivityEffort;

use AppBundle\Entity\Activity;
use AppBundle\Entity\ActivityEffort;
use AppBundle\Entity\Package;
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

class CreateActivityEffortField extends AbstractContainerAwareField
{
    use ActivityEffortMapperTrait;

    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'activity' => new NonNullType(new IntType()),
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

        $activity = $entityManager->find(Activity::class, $args['activity']);
        $activityEffort = new ActivityEffort($activity);
        $entityManager->persist($this->mapActivityEffort($args, $activityEffort));
        $entityManager->flush();

        $repository = $entityManager->getRepository(ActivityEffort::class);

        return $repository->get($value, ['id' => $activityEffort->getId()], $info);
    }

    public function getType()
    {
        return new ActivityEffortType();
    }

    public function getName()
    {
        return 'activityEffortCreate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
