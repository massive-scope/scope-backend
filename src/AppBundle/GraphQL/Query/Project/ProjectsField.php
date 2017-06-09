<?php

namespace AppBundle\GraphQL\Query\Project;

use AppBundle\Entity\Project;
use AppBundle\GraphQL\Type\ProjectsType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class ProjectsField extends AbstractContainerAwareField
{
    public function build(FieldConfig $config)
    {
        $this->addArgument('id', new IntType());
        $this->addArgument('title', new StringType());
        $this->addArgument('offset', new IntType());
        $this->addArgument('size', new IntType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Project::class);
        $queryBuilder = $repository->createQueryBuilder('entity');

        if (array_key_exists('id', $args)) {
            $repository->whereId($args['id'], $queryBuilder);
        }

        if (array_key_exists('title', $args)) {
            $repository->whereTitle($args['title'], $queryBuilder);
        }

        $result = [];
        if ($field = $info->getFieldAST('total')) {
            $result['total'] = intval($queryBuilder->select('COUNT(entity.id)')->getQuery()->getSingleScalarResult());
        }

        if (!$field = $info->getFieldAST('items')) {
            return $result;
        }

        $repository->addFields($field->getFields(), $queryBuilder);

        if (array_key_exists('offset', $args)) {
            $queryBuilder->setFirstResult($args['offset']);
        }

        if (array_key_exists('size', $args)) {
            $queryBuilder->setMaxResults($args['size']);
        }

        $result['items'] = $queryBuilder->getQuery()->getResult();

        return $result;
    }

    public function getType()
    {
        return new ProjectsType();
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
