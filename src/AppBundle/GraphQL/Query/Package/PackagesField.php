<?php

namespace AppBundle\GraphQL\Query\Package;

use AppBundle\Entity\Package;
use AppBundle\GraphQL\Type\PackagesType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class PackagesField extends AbstractContainerAwareField
{
    use PackageQueryBuilderTrait;

    public function build(FieldConfig $config)
    {
        $this->addArgument('project', new IntType());
        $this->addArgument('title', new StringType());
        $this->addArgument('offset', new IntType());
        $this->addArgument('size', new IntType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Package::class);
        $queryBuilder = $repository->createQueryBuilder('entity');

        if (array_key_exists('title', $args)) {
            $queryBuilder->where('entity.title LIKE :title')->setParameter('title', '%' . $args['title'] . '%');
        }

        if ($info->getFieldAST('project')) {
            $queryBuilder->leftJoin('entity.process', 'process')
                ->andWhere('IDENTITY(process.project) = :project')
                ->setParameter('project', $args['project']);
        }

        $result = [];
        if ($field = $info->getFieldAST('total')) {
            $result['total'] = intval($queryBuilder->select('COUNT(entity.id)')->getQuery()->getSingleScalarResult());
        }

        if (!$field = $info->getFieldAST('items')) {
            return $result;
        }

        $this->addPackageFields($field->getFields(), $queryBuilder);

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
        return new PackagesType();
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
