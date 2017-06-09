<?php

namespace AppBundle\GraphQL\Query\ActivityEffort;

use AppBundle\Entity\ActivityEffort;
use AppBundle\GraphQL\Type\ActivityEffortsType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class ActivityEffortsField extends AbstractContainerAwareField
{
    use ActivityEffortQueryBuilderTrait;

    public function build(FieldConfig $config)
    {
        $this->addArgument('activity', new IntType());
        $this->addArgument('description', new StringType());
        $this->addArgument('offset', new IntType());
        $this->addArgument('size', new IntType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(ActivityEffort::class);
        $queryBuilder = $repository->createQueryBuilder('entity');

        if (array_key_exists('description', $args)) {
            $queryBuilder->where('entity.description LIKE :description')
                ->setParameter('description', '%' . $args['description'] . '%');
        }

        if ($info->getFieldAST('activity')) {
            $queryBuilder->andWhere('IDENTITY(entity.activity) = :activity')
                ->setParameter('activity', $args['activity']);
        }

        $result = [];
        if ($field = $info->getFieldAST('total')) {
            $result['total'] = intval($queryBuilder->select('COUNT(entity.id)')->getQuery()->getSingleScalarResult());
        }

        if (!$field = $info->getFieldAST('items')) {
            return $result;
        }

        $this->addActivityEffortFields($field->getFields(), $queryBuilder);

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
        return new ActivityEffortsType();
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
