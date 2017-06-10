<?php

namespace AppBundle\GraphQL\Mutation\Activity;

use AppBundle\Entity\Activity;
use AppBundle\Entity\Package;
use AppBundle\GraphQL\Query\Activity\ActivityQueryBuilderTrait;
use AppBundle\GraphQL\Type\ActivityType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class CreateActivityField extends AbstractContainerAwareField
{
    use ActivityMapperTrait;

    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'package' => new NonNullType(new IntType()),
                'title' => new NonNullType(new StringType()),
                'description' => new StringType(),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $package = $entityManager->find(Package::class, $args['package']);

        $activity = new Activity($package);
        $entityManager->persist($this->mapActivity($args, $activity));
        $entityManager->flush();

        $repository = $entityManager->getRepository(Activity::class);

        return $repository->get($value, ['id' => $activity->getId()], $info);
    }

    public function getType()
    {
        return new ActivityType();
    }

    public function getName()
    {
        return 'activityCreate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
