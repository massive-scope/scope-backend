<?php

namespace AppBundle\GraphQL\Query\Package;

use AppBundle\Entity\Package;
use AppBundle\GraphQL\Type\PackageType;
use AppBundle\GraphQL\Type\ProjectType;
use Doctrine\ORM\EntityManagerInterface;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQLBundle\Field\AbstractContainerAwareField;

class PackageField extends AbstractContainerAwareField
{
    use PackageQueryBuilderTrait;

    public function build(FieldConfig $config)
    {
        $this->addArgument('id', new NonNullType(new IntType()));
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        /** @var EntityManagerInterface $entityManager */
        $entityManager = $this->get('doctrine.orm.entity_manager');
        $repository = $entityManager->getRepository(Package::class);
        $queryBuilder = $repository->createQueryBuilder('entity');
        $this->addPackageFields($info->getFieldASTList(), $queryBuilder);

        return $queryBuilder
            ->where('entity.id = :id')
            ->setParameter('id', $args['id'])
            ->getQuery()
            ->getSingleResult();
    }

    public function getType()
    {
        return new PackageType();
    }

    public function get($id)
    {
        return $this->container->get($id);
    }
}
