<?php

namespace AppBundle\GraphQL\Mutation\Activity;

use AppBundle\Entity\Activity;
use AppBundle\GraphQL\Query\Activity\ActivityQueryBuilderTrait;
use AppBundle\GraphQL\Type\ActivityType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class DeleteActivityField extends AbstractContainerAwareField
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
        $repository = $entityManager->getRepository(Activity::class);
        $result = $repository->get($value, $args, $info);

        $entityManager->remove($entityManager->getReference(Activity::class, $args['id']));
        $entityManager->flush();

        return $result;
    }

    public function getType()
    {
        return new ActivityType();
    }

    public function getName()
    {
        return 'activityDelete';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
