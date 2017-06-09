<?php

namespace AppBundle\GraphQL\Mutation\Project;

use AppBundle\Entity\Project;
use AppBundle\GraphQL\Type\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class UpdateProjectField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $config->addArguments(
            [
                'id' => new NonNullType(new IntType()),
                'title' => new NonNullType(new StringType()),
            ]
        );
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');

        $project = $entityManager->find(Project::class, $args['id']);
        $project->setTitle($args['title']);
        $entityManager->flush();

        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Project::class);
        $queryBuilder = $repository->createQueryBuilder('entity');

        $queryBuilder->where('entity.id = :id')->setParameter('id', $project->getId());
        $repository->addFields($info->getFieldASTList(), $queryBuilder);

        return $queryBuilder->getQuery()->getSingleResult();
    }

    public function getType()
    {
        return new ProjectType();
    }

    public function getName()
    {
        return 'projectUpdate';
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
